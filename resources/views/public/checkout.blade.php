@extends('public.master')

@section('style')
    <style>
        .color-box {
            width: 30px;
            height: 30px;
            border: 2px solid transparent;
            border-radius: 3px;
            cursor: pointer;
            transition: border 0.2s ease;
        }
    </style>

    <style>
        .just-validate-error-label {
            color: #f44336;
            font-size: 13px;
            margin-top: -20px !important;
            margin-bottom: 15px !important;
        }
    </style>
@endsection

@section('content')
    <div class="post section-padding bg-cream" style="background: #181c21">
        <div class="container">
            <div class="section">
                <div class="row">
                    <!-- Comment -->

                    <!-- Contact Form -->
                    <div class="col-lg-8 col-md-12">
                        <h4 class="white">Checkout </h4>
                        <div class="form-box"
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;">

                            <form method="post" class="row" id="checkoutform">
                                @csrf

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">First
                                        Name</label>
                                    <input type="text" name="fname" id="fname" placeholder="First Name *"
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Last
                                        Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Last Name *"
                                        required="">
                                </div>



                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Address</label>
                                    <input type="text" name="address" id="address" placeholder="Address "
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Address2</label>
                                    <input type="text" name="address2" id="address2"
                                        placeholder="Apartment, suite, etc. (optional)" required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">State</label>
                                    <select name="state" id="state">
                                        <option value=""> Select State</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Uttarpradesh">Uttarpradesh</option>
                                        <option value="Goa">Goa</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">City</label>
                                    <input type="text" name="city" id="city" placeholder="eg: new delhi "
                                        required="">
                                </div>


                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Zip
                                        Code</label>
                                    <input type="text" name="zipcode" id="zipcode" placeholder="Zip Code"
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Phone
                                        No.</label>
                                    <input type="text" name="phone" id="phone" placeholder="Phone No. "
                                        required="">
                                </div>

                                <div class="col-md-12 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Email
                                        Address</label>
                                    <input type="email" name="email" id="email" placeholder="Email address *"
                                        required="">
                                </div>

                                {{-- <div class="col-md-12" style="padding:0px;">
                                    <h4>Choose Payment Method</h4>

                                    <div class="payment-tabs">
                                        <div id="credit-btn" class="tab-button active" onclick="switchTab('credit')">
                                            <i class="fa-solid fa-credit-card icon"></i> Credit Card
                                        </div>
                                        <div id="debit-btn" class="tab-button" onclick="switchTab('debit')">
                                            <i class="fa-solid fa-credit-card icon"></i> Debit Card
                                        </div>
                                        <div id="upi-btn" class="tab-button" onclick="switchTab('upi')">
                                            <i class="fa-brands fa-google-pay icon"></i> UPI
                                        </div>
                                        <div id="cod-btn" class="tab-button" onclick="switchTab('cod')">
                                            <i class="fa-solid fa-money-bill-wave icon"></i> Cash on Delivery
                                        </div>
                                    </div>

                                    <div id="credit" class="tab-content active">
                                        <label>Card Number</label><br>
                                        <input type="text" placeholder="XXXX-XXXX-XXXX-XXXX">
                                        <label>Expiration Date</label><br>
                                        <input type="text" placeholder="MM/YY">
                                        <label>CVV</label><br>
                                        <input type="text" placeholder="XXX">
                                    </div>

                                    <div id="debit" class="tab-content">
                                        <label>Card Number</label><br>
                                        <input type="text" placeholder="XXXX-XXXX-XXXX-XXXX">
                                        <label>Expiration Date</label><br>
                                        <input type="text" placeholder="MM/YY">
                                        <label>CVV</label><br>
                                        <input type="text" placeholder="XXX">
                                    </div>

                                    <div id="upi" class="tab-content">
                                        <label>Enter UPI ID</label><br>
                                        <input type="text" placeholder="example@upi">
                                    </div>

                                    <div id="cod" class="tab-content">
                                        <p>You have selected <strong>Cash on Delivery</strong>. You will pay at the time of
                                            delivery.</p>
                                    </div>
                                </div> --}}

                                <!-- Hidden product details -->
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_name" id="product_name" value="{{ $product->name }}">
                                <input type="hidden" name="color_id" id="color_id" value="{{ $selectedColor->id ?? '' }}">
                                <input type="hidden" name="color_name" id="color_name"
                                    value="{{ $selectedColor->name ?? '' }}">
                                <input type="hidden" name="size_id" id="size_id" value="{{ $selectedSize->id ?? '' }}">
                                <input type="hidden" name="size_name" id="size_name"
                                    value="{{ $selectedSize->name ?? '' }}">
                                {{-- <input type="hidden" name="price" value="{{ $subtotal }}"> --}}
                                <input type="hidden" name="discount" id="discount" value="{{ $discount }}">
                                <input type="hidden" name="shipping" id="shipping" value="{{ $shipping }}">
                                <input type="hidden" name="tax" id="tax" value="{{ $tax }}">
                                <input type="hidden" name="total" id="total" value="{{ $total }}">
                                <input type="hidden" name="price" id="price" value="{{ $product->price }}">

                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div>
                            <h4 class="white">Your Cart</h4>
                            <div class="cart-section">

                                <!-- Product Item -->
                                <div class="cart-item">
                                    <span>{{ $product->name }}</span>
                                    <span><b>₹{{ number_format($product->price + $discount, 2) }}</b></span>
                                </div>

                                <!-- Variant info -->
                                <div class="cart-item"
                                    style="font-size:14px; color:#aaa; display:flex; align-items:center; gap:8px; flex-wrap:wrap;">

                                    @if ($selectedColor)
                                        <span>Color :</span>
                                        <div class="color-box"
                                            style="width:18px; height:18px; border:1px solid #ccc; border-radius:3px;
                    background-color: {{ $selectedColor->hex_code ?? '#000' }} !important;">
                                        </div>
                                    @endif

                                    @if ($selectedSize)
                                        <span>Size: {{ $selectedSize->name }}</span>
                                    @endif
                                </div>

                                <!-- Summary -->
                                <div class="cart-summary mt-15">
                                    {{-- <div class="cart-item">
                                        <span>Subtotal:</span><span>₹{{ number_format($subtotal, 2) }}</span>
                                    </div> --}}
                                    <div class="cart-item">
                                        <span>Discount:</span><span>-₹{{ number_format($discount, 2) }}</span>
                                    </div>
                                    <div class="cart-item">
                                        <span>Shipping:</span><span>₹{{ number_format($shipping, 2) }}</span>
                                    </div>
                                    <div class="cart-item"><span>Tax:</span><span>₹{{ number_format($tax, 2) }}</span>
                                    </div>
                                    <hr>
                                    <div class="cart-item">
                                        <strong>Total:</strong><strong>₹{{ number_format($total, 2) }}</strong>
                                    </div>
                                </div>

                                <button type="submit" class="mt-30" form="checkoutform"
                                    style="width:100%; padding:12px; background:#3b2659; color:#fff; border:none; border-radius:8px;">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        const validation = new JustValidate('#checkoutform', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: 'red',
                fontSize: '13px',
                display: 'block',
            }
        });

        validation
            .addField('#fname', [{
                rule: 'required',
                errorMessage: 'First Name is required'
            }])
            .addField('#lname', [{
                rule: 'required',
                errorMessage: 'Last Name is required'
            }])
            .addField('#address', [{
                rule: 'required',
                errorMessage: 'Address is required'
            }])
            .addField('#address2', [{
                rule: 'minLength',
                value: 3,
                errorMessage: 'Minimum 3 characters',
                validator: (value) => {
                    return value.length === 0 || value.length >= 3;
                }
            }])
            .addField('#state', [{
                rule: 'required',
                errorMessage: 'State is required'
            }])
            .addField('#city', [{
                rule: 'required',
                errorMessage: 'City is required'
            }])
            .addField('#zipcode', [{
                rule: 'required',
                errorMessage: 'Zip Code is required'
            }, {
                rule: 'number',
                errorMessage: 'Zip Code must be a number'
            }])
            .addField('#phone', [{
                rule: 'required',
                errorMessage: 'Phone Number is required'
            }, {
                rule: 'number',
                errorMessage: 'Phone must be numeric'
            }, {
                rule: 'minLength',
                value: 10,
                errorMessage: 'Min 10 digits'
            }, {
                rule: 'maxLength',
                value: 15,
                errorMessage: 'Max 15 digits'
            }])
            .addField('#email', [{
                rule: 'required',
                errorMessage: 'Email is required'
            }, {
                rule: 'email',
                errorMessage: 'Enter a valid email'
            }])
            .onSuccess((event) => {
                document.querySelector('#checkoutform').addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('form submitted');
                })
                // ✅ Build form data
                const formData = {
                    fname: document.querySelector('#fname').value,
                    lname: document.querySelector('#lname').value,
                    address: document.querySelector('#address').value,
                    address2: document.querySelector('#address2').value,
                    state: document.querySelector('#state').value,
                    city: document.querySelector('#city').value,
                    zipcode: document.querySelector('#zipcode').value,
                    phone: document.querySelector('#phone').value,
                    email: document.querySelector('#email').value,

                    // Hidden inputs from the form
                    product_id: document.querySelector('#product_id').value,
                    product_name: document.querySelector('#product_name').value,
                    color_id: document.querySelector('#color_id').value,
                    color_name: document.querySelector('#color_name').value,
                    size_id: document.querySelector('#size_id').value,
                    size_name: document.querySelector('#size_name').value,
                    discount: document.querySelector('#discount').value,
                    shipping: document.querySelector('#shipping').value,
                    tax: document.querySelector('#tax').value,
                    total: document.querySelector('#total').value,
                    price: document.querySelector('#price').value
                };

                // ✅ CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // ✅ Send AJAX request to create order
                fetch('/order/create', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        if (data.status) {
                            console.log(data.orderId);
                            launchRazorpayPayment(data.orderId);
                        } else {
                            alert('Failed to create order.');
                        }
                    })
                    .catch(err => console.error('Error:', err));
            });
    </script>
    <script>
        function launchRazorpayPayment(orderId) {

            fetch("/create-order/" + orderId)
                .then(res => res.json())
                .then(data => {
                    var options = {
                        "key": data.key,
                        "amount": 100000, // paise
                        "currency": "INR",
                        "name": "Atkans Rack",
                        "description": "Test Transaction",
                        "order_id": data.orderId,
                        "handler": function(response) {
                            fetch("{{ route('razorpay.verify') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify(response)
                                }).then(res => res.json())
                                .then(result => {
                                    if (result.success) {
                                        fetch("/order/update/payment-status/" + orderId, {
                                            method: "GET",
                                        }).then(res => res.json()).then(result => {
                                            if (result.success) {
                                                // window.location.replace =
                                                //     "{{ route('order.confirm') }}";
                                                window.history.pushState(null, null,
                                                    "{{ route('order.confirm') }}");
                                                window.history.go(1);
                                                window.location.replace(
                                                    "{{ route('order.confirm') }}");

                                            }
                                        })
                                    }
                                });
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    e.preventDefault();
                });

        }
    </script>
@endpush
