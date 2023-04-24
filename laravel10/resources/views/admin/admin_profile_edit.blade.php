@extends('admin.admin_master')
@section('admin')

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Edit Profile Page</h4>

            <form action="">

              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control" type="text" placeholder="" value="{{ $editData->name }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input name="email" class="form-control" type="text" placeholder="" value="{{ $editData->email }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input name="username" class="form-control" type="text" placeholder="" value="{{ $editData->username }}" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                <div class="col-sm-10">
                  <input name="profile_image" class="form-control" type="file" placeholder="" id="">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="profile_image" class="col-sm-2 col-form-label"></label>

                <div class="col-sm-10">
                  <img class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                </div>
              </div>
              <!-- end row -->
              <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Profile">
            </form>

          </div>
        </div>
      </div> <!-- end col -->
    </div>

  </div>
</div>

@endsection