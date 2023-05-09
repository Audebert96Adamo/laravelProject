@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Footer Page</h4><br><br>
            <form method="post" action="{{ route('update.footer') }}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{ $allfooter->id }}">

              <div class="row mb-3">
                <label for="number" class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-10">
                  <input name="number" class="form-control" type="text" placeholder="" value="{{ $allfooter->number }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                  <textarea required="" name="short_description" class="form-control" rows="5">
                  {{ $allfooter->short_description }}
                  </textarea>
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">Adress</label>
                <div class="col-sm-10">
                  <input name="adress" class="form-control" type="text" placeholder="" value="{{ $allfooter->adress }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input name="email" class="form-control" type="email" placeholder="" value="{{ $allfooter->email }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="facebook" class="col-sm-2 col-form-label">Facebook </label>
                <div class="col-sm-10">
                  <input name="facebook" class="form-control" type="text" placeholder="" value="{{ $allfooter->facebook }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="twitter" class="col-sm-2 col-form-label">Twitter </label>
                <div class="col-sm-10">
                  <input name="twitter" class="form-control" type="text" placeholder="" value="{{ $allfooter->twitter }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="copyright" class="col-sm-2 col-form-label">Copyright </label>
                <div class="col-sm-10">
                  <input name="copyright" class="form-control" type="text" placeholder="" value="{{ $allfooter->copyright }}" id="">
                </div>
              </div>
              <!-- end row -->
              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Footer Page">

            </form>

          </div>
        </div>
      </div> <!-- end col -->
    </div>

  </div>
</div>

@endsection