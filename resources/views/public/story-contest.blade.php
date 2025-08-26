@extends('public.master')

@section('style')
    <style>
        .just-validate-error-label {
            color: #f44336;
            font-size: 13px;
            margin-top: -20px !important;
            margin-bottom: 15px !important;
        }
    </style>
    <style>
        @media(max-width: 768px) {
            .kadwa {
                padding-right: 0px !important;
            }

            .box {
                border: 1px dashed #ccff00;
                border-radius: 10px;
                padding: 30px 15px;
                margin-bottom: 30px;
                margin-left: 5px;
                margin-right: 30px;
                width: 100% !important;

            }

            .box2 {
                border: 1px dashed #ccff00;
                border-radius: 10px;
                padding: 30px 15px;
                margin-bottom: 30px;
                margin-left: 5px;
                text-align: left;
                color: #fff;
                margin-right: 30px;
                width: 100% !important;

            }

        }

        .box {
            border: 1px dashed #ccff00;
            border-radius: 10px;
            padding: 30px 15px;
            margin-bottom: 30px;
            margin-left: 5px;
            margin-right: 30px;
            width: 55%;

        }

        .box2 {
            border: 1px dashed #ccff00;
            border-radius: 10px;
            padding: 30px 15px;
            margin-bottom: 30px;
            margin-left: 5px;
            text-align: left;
            color: #fff;
            margin-right: 30px;
            width: 35%;

        }

        .box h2 {
            color: #ccff00;
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: left;
            border-bottom: 1px dashed;
        }

        .box2 h2 {
            color: #ccff00;
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: left;
            border-bottom: 1px dashed;
        }

        .rules {
            font-size: 17px;
            line-height: 25px;
            color: #fff;
        }

        .submit-btn {
            background-color: #ccff00;
            color: black;
            font-weight: 500;
            font-size: 17px;
            padding: 12px 25px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s ease;
        }
    </style>
@endsection
@section('content')
    <div class="post section-padding bg-cream" style="background: #181c21; padding: 55px 0;">
        <div class="container">
            <div class="section">
                @include('public.partials.alert')

                <div class="row">
                    <!-- Comment -->
                    <!-- Contact Form -->
                    <div class=" col-md-12">
                        <div class="form-box row"
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;  text-align: center;">
                            <!-- <h5 class="white">Leave <span>a Reply</span></h5> -->
                            <div class="box col-md-8" style="text-align:left">
                                <h2>Rules of Participation</h2>
                                <div class="rules">
                                    • articipants must first follow us.<br><br>
                                    • Participants must repost and mention us in their story. Private accounts must send a
                                    screenshot of reposting.<br><br>
                                    • participate, send your best photo and Instagram username (e.g., @yourusername) and
                                    Submit your Instagram account link.
                                </div>
                            </div>

                            <!-- Box 2: Form -->
                            <div class="box2 col-md-4">
                                <h2>Submit Your Entry</h2>
                                <form id="story_contest" method="POST" action="{{ route('story.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label for="username">Write Username ~</label>
                                        <input type="text" id="username" name="username" placeholder="@yourusername"
                                            value="{{ old('username') }}" required class="form-control">
                                    </div>

                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label for="insta_link">Submit your Instagram account link</label>
                                        <input type="text" id="insta_link" name="instagram_link"
                                            value="{{ old('instagram_link') }}"
                                            placeholder="Submit your Instagram account link" required class="form-control">
                                    </div>

                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label for="photo">Submit Your Best Photo ~</label>
                                        <input type="file" id="photo" name="photo" accept="image/*" required
                                            class="form-control">
                                    </div>

                                    <button type="submit" class="submit-btn">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            // Wait 2 seconds then redirect
            setTimeout(function() {

                window.location.href = "{{ url('/thank-you') }}";

            }, 2000);
        </script>
    @endif
@endsection


@push('scripts')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script>
        const form = document.getElementById('story_contest');

        const validation = new JustValidate('#story_contest', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: 'red',
                fontSize: '13px',
                display: 'block',
            }
        });

        validation
            .addField('#username', [{
                    rule: 'required',
                    errorMessage: 'Username is required'
                },
                {
                    rule: 'minLength',
                    value: 3,
                    errorMessage: 'Must be at least 3 characters'
                }
            ])
            .addField('#insta_link', [{
                    rule: 'required',
                    errorMessage: 'Instagram link is required'
                },
                {
                    rule: 'customRegexp',
                    value: /^(http|https):\/\/[^ "]+$/,
                    errorMessage: 'Enter a valid URL'
                }
            ])
            .addField('#photo', [{
                    rule: 'minFilesCount',
                    value: 1,
                    errorMessage: 'Please upload an image',
                },
                {
                    rule: 'files',
                    value: {
                        files: {
                            extensions: ['jpg', 'jpeg', 'png'],
                            maxSize: 5000000, // 5MB
                        },
                    },
                    errorMessage: 'Only JPG/PNG and max 5MB allowed',
                }
            ])
            .onSuccess(() => {
                form.submit();
            });
    </script>
@endpush
