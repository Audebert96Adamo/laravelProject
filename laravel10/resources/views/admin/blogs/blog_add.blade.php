@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #b70000;
    font-weight: 700px;
  }
</style>
<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Blog Page</h4><br><br>
            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <label for="blog_category_id" class="col-sm-2 col-form-label">Blog Category Name</label>
                <div class="col-sm-10">
                  <select name="blog_category_id" class="form-select" aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                <div class="col-sm-10">
                  @error('blog_title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <input name="blog_title" class="form-control" type="text" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="blog_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                <div class="col-sm-10">
                  <input name="blog_tags" value="home,tech" class="form-control" type="text" data-role="tagsinput">
                </div>
              </div>
              <!-- end row -->
              <!-- FORM EDITOR : id="elm1" -->
              <div class="row mb-3">
                <label for="blog_description" class="col-sm-2 col-form-label">Blog description</label>
                <div class="col-sm-10">
                  <textarea required="" id="elm1" name="blog_description">

                  </textarea>
                </div>
              </div>
              <!-- FORM EDITOR END -->
              <!-- end row -->
              <div class="row mb-3">
                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                <div class="col-sm-10">
                  <input name="blog_image" class="form-control" type="file" placeholder="" id="image">
                </div>
              </div>

              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
              </div>
              <!-- end row -->
              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Insert Blog Data">

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