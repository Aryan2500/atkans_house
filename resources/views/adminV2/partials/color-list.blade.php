 @foreach ($colors as $color)
     <div class="form-check mr-3">
         <input type="checkbox" name="colors[]" value="{{ $color->id }}" class="form-check-input"
             id="color_{{ $color->id }}"
             {{ isset($product) && $product->colors->contains($color->id) ? 'checked' : '' }}>
         <label class="form-check-label" for="color_{{ $color->id }}">
             <span class="badge" style="background: {{ $color->hex_code ?? '#ccc' }}">
                 {{ $color->name }}
             </span>
         </label>
     </div>
 @endforeach
