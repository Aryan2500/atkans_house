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

  <div class="row">

      @if (auth()->user()->modelprofile != null && auth()->user()->modelprofile->photos->count() > 0)
          @foreach (auth()->user()->modelprofile->photos as $photo)
              <div class="col-sm-2 thumb pt-2">
                  <img src="{{ asset($photo->photo_path) }}" class="img-fluid mb-2" alt="white sample" data-toggle="modal"
                      data-target="#galleryModal">
              </div>
          @endforeach
      @endif

  </div>




  <div class="modal fade" id="galleryModal">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="galleryModalLabel">My Image</h5>
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
