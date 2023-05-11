@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Add Blog Category</h4><br><br>
            <form method="post" id="myForm" action="{{ route('store.blog.category') }}">
              @csrf

              <div class="row mb-3">
                <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                <div class="form-group col-sm-10">

                  <input name="blog_category" class="form-control" type="text" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->

              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Insert Category">

            </form>

          </div>
        </div>
      </div> <!-- end col -->
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        blog_category: {
          required: true,
        },
        // blog_title: {
        //   required: true,
        // },
      },
      messages: {
        blog_category: {
          required: 'Please Enter Blog category',
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalide-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClassn, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClassn, validClass) {
        $(element).removeClass('is-invalid');
      }

    })
  })
</script>

@endsection