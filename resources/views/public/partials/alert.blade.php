@if (session('success'))
    <div class="custom-alert success-alert">
        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="custom-alert error-alert">
        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="custom-alert error-alert">
        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
