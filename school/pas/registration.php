<?php 
include_once('include/config.php');

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.htmlssss"><h2>Student Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">

					<!--To send a file in php you have to put an enctype attribute in your form which i did below because
					we are going to collect pictures from the user and thats a file -->
					<form name="registration" id="registration"  method="post" enctype="multipart/form-data">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="matric_no" placeholder="Matric Number" required>
							</div>

							Please image height and width should be 30 by 30.
							<div class="form-group">
							<label for="profile_pic">
									Choose profile picture
								</label>
								<input type="file" name="picture" class="form-control" required >
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> P.A.S</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	</body>
	<!-- end: BODY -->
</html>

<?php
if(isset($_POST['submit'])){

	$full_name = $_POST['full_name'];
	$matric_no = $_POST['matric_no'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	//The $_FILES is a super global variable that is used to upload files that takes to argument e.g $_FILES[][];
	// The $_FILES take the name of the file which is done below the name of the file is 'picture' then you put name again in the second bracket
	// ['tmp_name'] is a temporary address where the file is located
	$profile_picture = time() . '_' . $_FILES['picture']['name'];
	$temp_name = $_FILES['picture']['tmp_name'];


	// Move uploaded file takes two argumemts which is the tmp_name and the name of the folder you are uploading your files to.
	move_uploaded_file($temp_name, "images/$profile_picture");
	
	$insert_user = "insert into users (fullName,matric_no,profile_pic,email,password) values ('$full_name','$matric_no','$profile_picture','$email','$password')";
	
	$run_user = mysqli_query($con,$insert_user) or die("Error".mysqli_error($con));
	
	if($run_user){
	echo "<script>alert('Successfully Registered. You can login now')</script>";
	echo "<script>window.open('user-login.php','_self')</script>";
	}
	else{
		echo "Failure to register user";
	}
	
	}

?>


