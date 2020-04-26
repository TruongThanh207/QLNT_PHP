
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
	<link rel="stylesheet" type="text/css" href="Asset/css/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			 @if(session('er'))
                          <div style="color:red"><p>
                               {{session('er')}}
                          </p></div>
                                   
                             
                        @endif
			<div class="card-body">
				 <form action="{{route('postlogin')}}" method="post"> 
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
					 <div class="form-group">
                                <label for="username">Email</label><br>
                                <input type="text" name="username" class="form-control">
                     </div>
					  <div class="form-group">
                                <label for="password">Password</label><br>
                                <input type="password" name="password" class="form-control">
                     </div>
					<div class="row align-items-center remember" >
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>