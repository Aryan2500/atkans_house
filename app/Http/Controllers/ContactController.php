<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'nullable',
        ]);

        // try {
        Contact::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'subject'    => $validated['subject'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
            // Admin-side default values:
            'is_viewed'  => false,
            'status'     => 'new',
        ]);

        return back()->with('success', 'Thanks for contacting us! You are now connected with our house. We will contact you soon.');
        // } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        // }
    }
}
