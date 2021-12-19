<?php include '../../../config.php'; 
		include '../../../functions.php';
      

		
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	  header("location:../../../index.php");
    exit;
}

$error = '';
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$statement = $db_con->prepare( "SELECT * FROM users WHERE email='".$email."'" );
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);

	if( $row["password"] == $password && $row["type"] != 'customers' ) {
		// Store data in session variables
		$_SESSION["loggedin"] = true;
	    $_SESSION["id"] = $row["id"];
	    $_SESSION["email"] = $row["email"];
	    $_SESSION["name"] = $row["name"];
	    $_SESSION["type"] = $row["type"];
	    $_SESSION['timeout']=time();
	    // Redirect user to welcome page
	    header("location:../../../index.php");
	} 
		// else if($row["status"] != 'on') {
		// $error = "Your account has been deactivated. Please contact <a href=\"mailto:".get_option('support_email')."\">".get_option('support_email')."</a> to activate your account.";
	// } 
		else {
	    $error = "Please enter valid credentials.";
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
		<title>Event Club | Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<?php include '../../../headerscript.php';?>
	

			</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(./assets/media/bg/bg-2.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="./assets/media/logos/logo-5.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In To Admin</h3>
								</div>
								<form class="kt-form" action="" method="POST">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"> Remember me
												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
										</div>
									</div>
									<div class="kt-login__actions">
										<input id="kt_login_signin_submit" type="submit" name="submit" class="btn btn-brand btn-pill kt-login__btn-primary" value="Sign In">
									</div>
								</form>
							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<!-- <form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Fullname" name="fullname">
									</div>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions"> -->
										<button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="/Event/demo1/custom/pages/user/signup.php" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<?php include '../../../footerscript.php'; ?>
	
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
