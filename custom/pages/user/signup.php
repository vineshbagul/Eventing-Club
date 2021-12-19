<?php include '../../../config.php'; 
		include '../../../functions.php';

		session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header("location:../../../index.php");
  exit;
}


$error = '';
// Processing form data when form is submitted
if(isset($_POST['submit'])){
	$firsname=trim($_POST['firstname']);
	$lastname=trim($_POST['lastname']);
	$username=trim($_POST['username']);
	$email = trim($_POST['email']);
	$mobileno=trim($_POST['mobileno']);
	$password = trim($_POST['password']);

	$statement = $db_con->prepare("INSERT INTO `users` (`firstname`, `lastname`, `email`, `mobile`, `username`, `password`) 
	VALUES ('".$firsname."','".$lastname."','".$email."','".$mobileno."','".$username."','".$password."')" );
	$statement->execute();
	if($statement==true)
	{
		  ?>
		  <script>
		  alert('Information saved successfully into the Database!!')
		  </script>
		  <?php
	}
	  
	

	
}
?>


<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../../../../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>Event Club | Sign Up</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<?php include '../../../headerscript.php';?>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

					<!--begin::Aside-->
					<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(./assets/media//bg/bg-4.jpg);">
						<div class="kt-grid__item">
							<a href="#" class="kt-login__logo">
								<img src="./assets/media/logos/logo-4.png">
							</a>
						</div>
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
							<div class="kt-grid__item kt-grid__item--middle">
								<h3 class="kt-login__title">Welcome to Event Club!</h3>
								<h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for next generation web apps.</h4>
							</div>
						</div>
						<div class="kt-grid__item">
							<div class="kt-login__info">
								<div class="kt-login__copyright">
									&copy 2019 Event Club
								</div>
								<div class="kt-login__menu">
									<a href="#" class="kt-link">Privacy</a>
									<a href="#" class="kt-link">Legal</a>
									<a href="#" class="kt-link">Contact</a>
								</div>
							</div>
						</div>
					</div>

					<!--begin::Aside-->

					<!--begin::Content-->
					<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

						
						<!--end::Head-->

						<!--begin::Body-->
						<div class="kt-login__body">

							<!--begin::Signin-->
							<div class="kt-login__form">
								<div class="kt-login__title">
									<h3>Sign Up</h3>
								</div>

								<!--begin::Form-->
								<form class="kt-form" action="" novalidate="novalidate" method="POST">
									<div class="form-group row">
										<div class="col-md-6">
											<input class="form-control" type="text" placeholder="First Name" name="firstname" autocomplete="off" style ="display: inline-block">
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" placeholder="Last Name" name="lastname" autocomplete="off">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-12">
											<input class="form-control" type="text" placeholder="Username" name="username">
										</div>
                                    </div>
                                    <div class="form-group row">
										<div class="col-md-6">
											<input class="form-control" type="text" placeholder="Mobile No." name="mobileno" autocomplete="off" style ="display: inline-block">
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" placeholder="Email id." name="email" autocomplete="off">
										</div>
                                    </div>
                                    <div class="form-group row">
										<div class="col-md-12">
											<input class="form-control" type="password" placeholder="Password" name="password">
										</div>
                                    </div>
									<div class="kt-login__actions">
										<input id="kt_login_signin_submit" type="submit" name="submit" class="btn btn-brand btn-pill kt-login__btn-primary" value="sign up">
									</div>
									

									<!--end::Action-->
								</form>

								<!--end::Form-->

								<!--begin::Divider-->
								<div class="kt-login__divider">
									<div class="kt-divider">
										<span></span>
										<span>OR</span>
										<span></span>
									</div>
								</div>

								<!--end::Divider-->

								<!--begin::Options-->
								<div class="kt-login__options">
									<a href="#" class="btn btn-primary kt-btn">
										<i class="fab fa-facebook-f"></i>
										Facebook
									</a>
									<a href="#" class="btn btn-info kt-btn">
										<i class="fab fa-twitter"></i>
										Twitter
									</a>
									<a href="#" class="btn btn-danger kt-btn">
										<i class="fab fa-google"></i>
										Google
									</a>
								</div>

								<!--end::Options-->
							</div>

							<!--end::Signin-->
						</div>

						<!--end::Body-->
					</div>

					<!--end::Content-->
				</div>
			</div>
		</div>

		<!-- end:: Page -->
		<?php include '../../../footerscript.php'; ?>
	</body>

	<!-- end::Body -->
</html>