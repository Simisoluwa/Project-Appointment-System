<?php
session_start();

include('include/config.php');

if(isset($_GET['cancel']))
		  {
		          mysqli_query($con,"update student_appointment set supervisorStatus='0' where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Appointment canceled !!";
		  }
	if(isset($_GET['cancel'])){
		echo "<script>alert('Send message to student for the reason you cancelled the appointment.')</script>";
		echo "<script>window.open('send-message.php','_self')</script>";
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Supervisor | Appointment History</title>
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
						<h1 class="mainTitle">Supervisor  | Appointment History</h1>
					</div>
					<ol class="breadcrumb">
						<li>
							<span>Supervisor </span>
						</li>
						<li class="active">
							<span>Appointment History</span>
						</li>
					</ol>
				</div>
			</section>
					
	<div class="container-fluid container-fullw bg-white">
						

	<div class="row">
		<div class="col-md-12">
		<?php echo htmlentities($_SESSION['msg']="");?></p>	
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">Student Email</th>
						<th>Student Matric No</th>
						<th>Course</th>
						<th>Appointment Date / Time </th>
						<th>Current Status</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				$sql=mysqli_query($con,"select * from student_appointment");
				$cnt=1;
				while($row=mysqli_fetch_array($sql))
				{
				?>

				<tr>
					<td class="center"><?php echo $cnt;?>.</td>
					<td class="hidden-xs"><?php echo $row['email'];?></td>
					<td><?php echo $row['matric']; ?></td>
					<td><?php echo $row['course'];?></td>
					<td><?php echo $row['appdate'];?> / <?php echo
						$row['apptime'];?>
					</td>
					<td>
				<?php 
				if(($row['userStatus']==1) && ($row['supervisorStatus']==1))  
				{
					echo "Active";
				}
				if(($row['userStatus']==0) && ($row['supervisorStatus']==1))  
				{
					echo "Canceled by Student";
				}

				if(($row['userStatus']==1) && ($row['supervisorStatus']==0))  
				{
					echo "Canceled by you";
				}
				?></td>
				<td >
			<div class="visible-md visible-lg hidden-sm hidden-xs">
				<?php 
				if(($row['userStatus']==1) && ($row['supervisorStatus']==1)){ 
				?>

			<a href="appointment-history.php?id=<?php echo $row['id']?>
			&cancel=update" 
			onClick="return confirm('Are you sure you want to cancel this appointment ?')"
			class="btn btn-transparent btn-xs tooltips" 
			title="Cancel Appointment" 
			tooltip-placement="top" 
			tooltip="Remove">Cancel</a>
			<?php } 
			else {
				echo "Canceled";
			} 
			?>
		</div>
			</td>
		</tr>
											
		<?php 
			$cnt=$cnt+1;
		}?>
											
											
		</tbody>
	</table>
</div>
</div>
</div>
				
</div>
</div>
</div>

	<?php include('include/footer.php');?>
			
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

