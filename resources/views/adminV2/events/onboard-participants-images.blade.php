@extends('adminV2.master')


@section('styles')
    <style>
        .thumb {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .thumb:hover {
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .thumb.selected {
            border: 3px solid #007bff;
            /* Bootstrap primary */
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
        }
    </style>
@endsection


@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Events</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Events / Participants Onboarding</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">User Images</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 thumb pt-2">
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG5hdHVyZXxlbnwwfHwwfHx8MA%3D%3D"
                            class="img-fluid mb-2" alt="white sample" data-toggle="modal" data-target="#galleryModal">
                    </div>

                    <div class="col-sm-2 thumb pt-2">
                        <img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmF0dXJlfGVufDB8fDB8fHww"
                            class="img-fluid mb-2" alt="white sample" data-toggle="modal" data-target="#galleryModal">
                    </div>


                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="galleryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Image</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12 text-center">
                            <img src="" class="img-fluid mb-2" alt="white sample">
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // When any image with data-toggle="modal" is clicked
            $('img[data-toggle="modal"]').on('click', function() {
                // Get the src of the clicked image
                var imgSrc = $(this).attr('src');

                // Set the src to the modal image
                $('#galleryModal img').attr('src', imgSrc);

                // Open the modal
                $('#galleryModal').modal('show');
            });

            $('.thumb').click(function() {

                // Highlight selected thumbnail
                $('.thumb').removeClass('selected');
                $(this).addClass('selected');
            });
        });
    </script>
@endpush
