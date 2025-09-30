<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Event;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function public_index()
    {
        //
        $products = Product::with(['images'])->latest()->get();


        $events = Event::where('type', 'Show')->where('event_stage', 'running')->get();
        // dd($products->count());
        return view("public.product", compact("products", 'events'));
    }

    public function index()
    {
        //
        $products = Product::with(['images', 'sizes', 'colors'])->latest()->get();
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.form', compact('sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->only([
            'name',
            'description',
            'price',
            'discount_price',
            'discount_percent',
            'material',
            'is_active'
        ]));

        // ✅ Attach colors
        $product->colors()->attach($request->colors ?? []);

        // ✅ Attach sizes with stock
        if ($request->sizes) {
            foreach ($request->sizes as $sizeId => $value) {
                $product->sizes()->attach($sizeId, [
                    'stock' => $request->stock[$sizeId] ?? 0
                ]);
            }
        }

        // ✅ Store images (flat, not color-based)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);

                $product->images()->create([
                    'image_url' => 'uploads/products/' . $filename,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created!');
    }

    /**
     * Display the specified resource.
     */
    public function public_show(Product $product)
    {
        // Load relations (images, sizes, colors)
        // dd($product);
        $product->load(['images', 'sizes', 'colors']);
        // dd($product);
        return view('public.product-details', compact('product'));
    }

    public function show(Product $product)
    {
        //
        // Load relations (images, sizes, colors)
        $product->load(['images', 'sizes', 'colors']);

        return view('public.product-details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.form', compact('sizes', 'colors', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only([
            'name',
            'description',
            'price',
            'discount_price',
            'discount_percent',
            'material',
            'is_active'
        ]));

        // ✅ Sync colors
        $product->colors()->sync($request->colors ?? []);

        // ✅ Sync sizes with stock
        $product->sizes()->detach(); // clear old pivot data
        if ($request->sizes) {
            foreach ($request->sizes as $sizeId => $value) {
                $product->sizes()->attach($sizeId, [
                    'stock' => $request->stock[$sizeId] ?? 0
                ]);
            }
        }

        // ✅ Replace old images if new uploaded
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($product->images as $oldImage) {
                $oldPath = public_path($oldImage->image_url);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
                $oldImage->delete();
            }

            // Save new images
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);

                $product->images()->create([
                    'image_url' => 'uploads/products/' . $filename,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete images from storage
        foreach ($product->images as $oldImage) {
            $oldPath = public_path($oldImage->image_url);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $oldImage->delete();
        }

        // Delete product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
