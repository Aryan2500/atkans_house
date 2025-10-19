  @foreach ($sizes as $size)
      <div class="form-check mr-3">
          <input type="checkbox" name="sizes[{{ $size->id }}]" class="form-check-input" id="size_{{ $size->id }}"
              {{ isset($product) && $product->sizes->contains($size->id) ? 'checked' : '' }}>
          <label class="form-check-label" for="size_{{ $size->id }}">
              {{ $size->name }} | {{ $size->number ?? 0 }}
          </label>
          <input type="number" name="stock[{{ $size->id }}]" placeholder="Stock"
              class="form-control form-control-sm mt-1"
              value="{{ isset($product) ? $product->sizes->find($size->id)?->pivot->stock : 0 }}">
      </div>
  @endforeach
