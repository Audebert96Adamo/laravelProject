@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">About Page</h4><br><br>
            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{ $aboutpage->id }}">

              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input name="title" class="form-control" type="text" placeholder="" value="{{ $aboutpage->title }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                <div class="col-sm-10">
                  <input name="short_title" class="form-control" type="text" placeholder="" value="{{ $aboutpage->short_title }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="short_description" class="col-sm-2 col-form-label">Short description</label>
                <div class="col-sm-10">
                  <textarea required="" name="short_description" class="form-control" rows="5">
                  {{ $aboutpage->short_description }}
                  </textarea>
                </div>
              </div>
              <!-- end row -->
              <!-- FORM EDITOR : id="elm1" -->
              <div class="row mb-3">
                <label for="long_description" class="col-sm-2 col-form-label">Long description</label>
                <div class="col-sm-10">
                  <textarea required="" id="elm1" name="long_description">
                  {{ $aboutpage->long_description }}
                  </textarea>
                </div>
              </div>
              <!-- FORM EDITOR END -->
              <!-- end row -->
              <div class="row mb-3">
                <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                <div class="col-sm-10">
                  <input name="about_image" class="form-control" type="file" placeholder="" value="" id="image">
                </div>
              </div>

              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
              </div>
              <!-- end row -->
              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update About Page">

            </form>

          </div>
        </div>
      </div> <!-- end col -->
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection