<?php 
session_start();
include('include/config.php');

if(isset($_POST['submit'])) //This function is to check if the submit button is set with the name = 'submit'
{
	$course = $_POST['course']; // This collects the course the user selected
	$supervisorName = $_POST['supervisor']; // This collects the supervisor the user selected
	$userEmail = $_POST['email'] ; // // This collects the email the user selected
	$matric = $_POST['matric_no'];// This collects the matric no the user entered
	$message = $_POST['message'];
	$query = "INSERT into supmessage(supcourse,supervisor,email,matric_no,user_message) 
	 values ('$course','$supervisorName','$userEmail', '$matric','$message')"; //Insert the query into the database and insert all the values the user entered into the database

	$result = mysqli_query($con,$query) 
			or die("Error".mysqli_error($con)); //This function is for handling errors in php msqli_erro()
		if($result){ // If the result is true then tell the user your message has been sent
			echo "<script>alert('Your message has been sent!');</script>";
		}		
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student  | Send Message</title>
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
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />	

	</head>
	<body>
	<div id="app">		
		<?php include('include/sidebar.php');?>
		<div class="app-content">
		
			<?php include('include/header.php');?>
					
		<!-- end: TOP NAVBAR -->
		<div class="main-content" >
			<div class="wrap-content container" id="container">
				<!-- start: PAGE TITLE -->
		<section id="page-title">
			<div class="row">
				<div class="col-sm-8">
					<h1 class="mainTitle">Student | Send Message</h1>
				</div>
				<ol class="breadcrumb">
					<li>
						<span>Student</span>
					</li>
					<li class="active">
						<span>Send Message</span>
					</li>
				</ol>
		</section>
		<!-- end: PAGE TITLE -->
		<!-- start: BASIC EXAMPLE -->
		<div class="container-fluid container-fullw bg-white">
			<div class="row">
				<div class="col-md-12">
					
			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Send Message</h5>
						</div>


		<div class="panel-body">
		<form role="form" name="book" method="post">
		<div class="form-group">
		<label for="course">
			Supervisor Course
		</label>
		<select name="course" class="form-control" required="required">
			<?php 
			$sql = mysqli_query($con,"select * from supervisorcourse");
				// Then we fetch all the values in an array then loop through it
			// Please note htmlentities in php is similar to a placeholder in html
			// Then i assign the array to a $row variable to get individual data i.e $row['email'], $row['course'] becuase email,course etc are all in the database
			while($row = mysqli_fetch_array($sql)){
			?>
				<option value="<?php echo htmlentities($row['course']);?>">
					<?php echo htmlentities($row['course']);?>
				</option>
			<?php } ?>
		</select>
		</div>
		<div class="form-group">
			<label for="supervisor">
				Supervisor
			</label>
			<select name="supervisor" class="form-control" required="required">
				<option selected>Select Supervisor</option>
				<option value="Dr Odumuyiwa">Dr Odumuyiwa</option>
			</select>
		</div>	
		<div class="form-group">
			<label for="email">
				Email
			</label>
			<?php 
			//Now this code below will check for the email where the session['email'] is the same with the present email
			// Because if we decide to select all emails from users without checking if the session['email'] actually belongs
			// to the email of a specific user it will end up retrieving all the emails from the user table

			$sql = mysqli_query($con,"select * from users where email = '".$_SESSION['email']."'");
			// Then we fetch all the values in an array then loop through it
			// Please note htmlentities in php is similar to a placeholder in html
			// Then i assign the array to a $row variable to get individual data i.e $row['email'] becuase email is in the database
			while($row = mysqli_fetch_array($sql)){
			?>
			<input type="text" name="email" class="form-control" value="<?php echo htmlentities($row['email']);?>" readonly>
			<?php } ?>
		</div>	
		<div class="form-group">
			<label for="matric">
				Matric No
			</label>
			<?php 
			$sql = mysqli_query($con,"select matric_no from users where email = '".$_SESSION['email']."'");
			while($row = mysqli_fetch_array($sql)){
			?>
			<input type="text" name="matric_no" class="form-control" value="<?php echo htmlentities($row['matric_no']);?>" readonly>
			<?php } ?>
		</div>	
        <div class="form-group">
			<label for="message">
				State your reasons for canceling the appointment
            </label>
            <textarea name="message" id="message" cols="6" rows="10" class="form-control" required></textarea>
		</div>										
																																							
		<button type="submit" name="submit" class="btn btn-o btn-primary">
		Send Message
		</button>
		</form>
		</div>
		</div>
	</div>
											
</div></div></div></div>
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
        </script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>


