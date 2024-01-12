@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

       
        <div class="row profile-body">
          <!-- left wrapper start -->
        
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Change Admin Password</h6>

                <form  action="{{route('admin.update.password')}}" method="POST" >
                  @csrf
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Old Password</label>
										<input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off" >
                    @error('old_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
									</div>
                 
                  <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">New Password</label>
										<input type="password" name="new_password" class="form-control  @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off" >
                    @error('new_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
									</div>
                 

                  <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
										<input type="password" name="new_password_confirmation" class="form-control " autocomplete="off" >
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

@endsection