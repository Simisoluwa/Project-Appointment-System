<?php 
session_start();
include('include/config.php');

if(isset($_POST['submit']))
{
	$course = $_POST['course'];
	$supervisorName = $_POST['supervisor'];
	$semester = $_POST['semester'];
    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
	$userstatus =  1;
	$supervisorstatus = 1;
	$query = "INSERT into appointment(supervisorCourse,supervisorName,semester,appointmentDate,appointmentTime,userStatus,supervisorStatus) 
	values ('$course','$supervisorName','$semester','$appdate','$apptime','$userstatus','$supervisorstatus')";

	$result = mysqli_query($con,$query) or die("Error".mysqli_error($con));
		if($result){
			echo "<script>alert('Your appointment has successfully been created');</script>";
		}
		
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Supervisor  | Create Appointment</title>
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
					<h1 class="mainTitle">Supervisor | Create Appointment</h1>
				</div>
				<ol class="breadcrumb">
					<li>
						<span>Supervisor</span>
					</li>
					<li class="active">
						<span>Create Appointment</span>
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
							<h5 class="panel-title">Create Appointment</h5>
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
			<label for="semester">
				Semester(s)
			</label>
			<select name="semester" class="form-control" required="required">
			<?php 
			$sql = mysqli_query($con,"select * from appointment");
			while($row = mysqli_fetch_array($sql)){
			?>
				<option value="<?php echo htmlentities($row['semester']);?>">
					<?php echo htmlentities($row['semester']);?>
				</option>
			<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="email">
				Email
			</label>
			<?php 
			$sql = mysqli_query($con,"select * from supervisors where email = '".$_SESSION['email']."'");
			while($row = mysqli_fetch_array($sql)){
			?>
			<input type="text" name="email" class="form-control" value="<?php echo htmlentities($row['email']);?>" readonly>
			<?php } ?>
		</div>												
		<div class="form-group">
			<label for="AppointmentDate">
				Days Available
			</label>
			<select name="appdate" class="form-control" required="required">
				<option selected>Select Days</option>
				<option value="monday">Monday</option>
                <option value="thursday">Thursday</option>
				<option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
			</select>
		</div>	
        <div class="form-group">
			<label for="AppointmentDate">
				Time Available
			</label>
			<input class="form-control" name="apptime" id="timepicker1" required="required">
			eg : 10:00 PM
		</div>																									
														
		<button type="submit" name="submit" class="btn btn-o btn-primary">
		Submit
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

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>


