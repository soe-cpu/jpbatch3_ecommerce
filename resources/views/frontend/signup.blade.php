@extends('frontendtemplate')
@section('content')
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="container">

      	<div class="card o-hidden border-0 shadow-lg my-5">
      		<div class="card-body p-0">
      			<!-- Nested Row within Card Body -->
      			<div class="row">
      				<div class="col-lg-5 d-none d-lg-block bg-register-image">
                              <img src="{{asset('backend_asset/images/item/1009594221.jpg')}}" width="500" height="100%">                    
                              </div>
      				<div class="col-lg-7">
      					<div class="p-5">
      						<div class="text-center">
      							<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
      						</div>
      						<form class="user" method="POST" action="signup.php" enctype="multipart/form-data">

      							<div class="form-group">
      								<input type="file" class="form-control-file" placeholder="Profile" name="user_profile">
      							</div>

      							<div class="form-group">
      								<input type="text" class="form-control form-control-user" placeholder="Name" name="user_name" value="">
      								<small class="text-danger"></small>
      							</div>
      							<div class="form-group">
      								<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="user_email" value="">
      							</div>

      							<div class="form-group">
      								<input type="password" class="form-control form-control-user" placeholder="Password" name="user_password" value="">
      							</div>

      							<div class="form-group">
      								<input type="password" class="form-control form-control-user" placeholder="Confirm Password" name="user_cpassword" value="">      								
      							</div>

      							<div class="form-group">
      								<input type="number" class="form-control form-control-user" placeholder="Phone Number" name="user_phone" value="">
      								
      							</div>

      							<div class="form-group">
      								<textarea class="form-control" placeholder="Address" name="user_address"></textarea>
      							</div>

      							<input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">

      						</form>
      						<hr>
      						<div class="text-center">
      							<a class="small" href="forgot-password.html">Forgot Password?</a>
      						</div>
      						<div class="text-center">
      							<a class="small" href="login.html">Already have an account? Login!</a>
      						</div>
      						<div class="text-center">
      							<a class="small" href="../index.php">back</a>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>

      </div>
     </section>

@endsection