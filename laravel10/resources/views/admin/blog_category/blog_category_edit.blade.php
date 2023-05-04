@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Edit Blog Category</h4><br><br>
            <form method="post" action="{{ route('update.blog.category', $blogcategory->id) }}">
              @csrf



              <div class="row mb-3">
                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                <div class="col-sm-10">
                  @error('blog_category')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <input name="blog_category" class="form-control" type="text" value="{{ $blogcategory->blog_category }}" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->

              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Category">

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