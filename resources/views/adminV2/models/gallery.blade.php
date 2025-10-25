<div class="row">
    <!-- Card 1 -->
    @if ($model->photos && count($model->photos) > 0)
        @foreach ($model->photos as $photo)
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset($photo->photo_path) }}" class="card-img-top " style="object-fit: cover;"
                            alt="gallery">
                        <a href="{{ asset($photo->photo_path) }}"
                            class="btn btn-primary btn-sm rounded-circle position-absolute"
                            style="bottom:10px; right:10px;" download>
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <img src="https://media.istockphoto.com/id/1222357475/vector/image-preview-icon-picture-placeholder-for-website-or-ui-ux-design-vector-illustration.jpg?s=612x612&w=0&k=20&c=KuCo-dRBYV7nz2gbk4J9w1WtTAgpTdznHu55W9FjimE="
                alt="" srcset="" width="100" height="100"><br>
            <p> User has no photos in gallery</p>
        </div>
    @endif

</div>
