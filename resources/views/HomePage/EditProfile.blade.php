@extends('Layoutshare')
 @section('content')


 		 <header> 
            <h1 class="h3 display">Detail            </h1>
          </header>
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-profile">
                <div style="background-image: url('Asset/images/{{$data->img}}');" class="card-header"></div>
                <div class="card-body text-center">
                  <h3 class="mb-3">{{$data->name}}</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="login-page">
                      @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
        <div class="form-outer form-detail text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><strong class="text-primary">Edit Profile</strong></div>
            <form class="text-left form-validate" action="{{route('posteditprofile',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="_token"   value="{{csrf_token()}}">
            <div class="row">
            	<div class="col-md-6 col-lg-6">
            		<div class="form-group-material">
		                <input id="register-username" type="text" name="Username" required data-msg="Please enter your username" class="input-material" value="{{$data->username}}">
		                <label for="register-username" class="label-material">Username</label>
		            </div>
		            <div class="form-group-material">
		                <input id="register-password" type="password" name="Password" class="input-material">
		                <label for="register-password" class="label-material">New Password        </label>
		            </div>
                <div class="form-group-material">
                    <input id="myfile" type="file" name="myfile" class="input-material">
                    @if(session('Error'))
                                              
                      <p style="color: red">{{session('Error')}}</p>
                    @endif
                </div>
            	</div>
            	<div class="col-md-6 col-lg-6">
            		<div class="form-group-material">
		                <input id="register-name" type="text"  name="Name" required data-msg="Please enter a valid name" class="input-material" value="{{$data->name}}">
		                <label for="register-email" class="label-material" >Name      </label>
		            </div>
		            <div class="form-group-material">
		                <input id="register-tel" type="number" min="0" minlength="10" maxlength="11" name="tel" required data-msg="Please enter a valid phone number" class="input-material" value="{{$data->tel}}">
                    <input type="hidden" class="hidden" name="role" value="{{$data->role}}">
		                <label for="register-tel" class="label-material">Tel      </label>
		            </div>
		            <div class="form-group-material">
		                <input id="register-email" type="email" name="Email" required data-msg="Please enter a valid email" class="input-material" value="{{$data->email}}">
		                <label for="register-email" class="label-material">Email      </label>
		             </div>
            	</div>        	
            </div>
              
              <div class="form-group text-center">
                <input id="register" type="submit" value="Save" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
    </div>
            </div>
</div>


 @endsection