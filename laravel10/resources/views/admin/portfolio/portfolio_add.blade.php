@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Portfolio Page</h4><br><br>
            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                <div class="col-sm-10">
                  <input name="portfolio_ame" class="form-control" type="text" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                <div class="col-sm-10">
                  <input name="portfolio_title" class="form-control" type="text" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->
              <!-- FORM EDITOR : id="elm1" -->
              <div class="row mb-3">
                <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio description</label>
                <div class="col-sm-10">
                  <textarea required="" id="elm1" name="portfolio_description">

                  </textarea>
                </div>
              </div>
              <!-- FORM EDITOR END -->
              <!-- end row -->
              <div class="row mb-3">
                <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                <div class="col-sm-10">
                  <input name="portfolio_image" class="form-control" type="file" placeholder="" id="image">
                </div>
              </div>

              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
              </div>
              <!-- end row -->
              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Portfolio Page">

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