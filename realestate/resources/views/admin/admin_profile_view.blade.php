@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div>
                    <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo))? url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="profile">
                    <span class="h4 ms-3 ">{{$profileData->username}}</span>
                  </div>
                  
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{$profileData->name}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{$profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">phone:</label>
                  <p class="text-muted">{{$profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                  <p class="text-muted">{{$profileData->address}}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="github"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Update Admin Profile</h6>

                <form  action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Username</label>
										<input type="text" name="txtusername" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
									</div>
                  <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Name</label>
										<input type="text" name="txtname" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}">
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Email address</label>
										<input type="email" name="txtemail" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->email}}">
									</div>
                  <div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Address</label>
										<input type="text" name="txtaddress" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->adress}}">
									</div>
                  <div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Phone</label>
										<input type="text" name="txtphone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->phone}}">
									</div>
									<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Photo</label>
										<input type="file" name="photo" class="form-control" id="exampleInputUsername1" autocomplete="off"  onChange="display_img(this)">
									</div>
                
                
                    <div align="center"><img class="wd-80 rounded-circle" src="{{(!empty($profileData->photo))? url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="studentphoto"  id="showImage">   
      </div>
								
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
								</form>

              </div>
            </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          <div class="d-none d-xl-block col-xl-3">
            
          </div>
          <!-- right wrapper end -->
        </div>

			</div>

      <script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#showImage').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
   
</script>
@endsection