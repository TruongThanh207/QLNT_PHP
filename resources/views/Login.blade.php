
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
		<div class="card ">
			 @if(session('er'))
                          <div style="color:red"><p>
                               {{session('er')}}
                          </p></div>
                                   
                             
                        @endif
            <div class="card-header header-login">
                <h2>ACCOUNT LOGIN</h2>
                
            </div>
                      
			<div class="card-body">
				 <form action="{{route('postlogin')}}" method="post"> 
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
					 <div class="form-group" id="user">
                                <label for="username">Email</label><br>
                                <input type="text" name="username" class="form-control">
                     </div>
					  <div class="form-group" id="pass">
                                <label for="password">Password</label><br>
                                <input type="password" name="password" class="form-control">
                     </div>
					<div>
						<div class="collapse" id="collapseExample">
						  <div class="form-group">
                                <label for="CMND">CMND</label><br>
                                <input type="text" name="cmnd" id="cmnd" class="form-control">
                     		</div>
						</div>
						<a href="#collapseExample" id="khachthue" data-toggle="collapse" style="color: blue;">Bạn là khách thuê?
						</a>
						
					</div>
					<div class="form-group">
						<input type="hidden" class="hidden" id="flag" name="flag" value="0">
						<input type="submit" value="Login" class="btn btn-warning float-right login_btn">
					</div>
				</form>
 

			</div>
			
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

<script>
	flag =0;
	$('#khachthue').click(function(){
		if(flag==0)
		{
			$('#user').hide();
			$('#pass').hide();
			$(this).text('Bạn là quản trị?');
			flag = 1;
		}
		else
		{
			$('#user').show();
			$('#pass').show();
			$(this).text('Bạn là khách thuê?');
			flag = 0;
		}
		

	})
</script>

</body>
</html>
