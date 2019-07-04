<?php
session_start(); //Start the session to authenticate a user
include('include/config.php'); // It includes the connection to the database

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student | View Messages</title>
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
			<?php include('include/sidebar.php'); // It incudes the sidebar.php
			
			?>
			<div class="app-content">


		<?php include('include/header.php'); // It includes the header.php ?>
		<div class="main-content" >
		<div class="wrap-content container" id="container">
		
			<section id="page-title">
				<div class="row">
					<div class="col-sm-8">
						<h1 class="mainTitle">Student  | View Messages</h1>
					</div>
					<ol class="breadcrumb">
						<li>
							<span>Student </span>
						</li>
						<li class="active">
							<span>View Messages</span>
						</li>
					</ol>
				</div>
			</section>
	
	<div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
						<tr>
                        
							<th class="center">#</th>
							<th class="hidden-xs">Course</th>
							<th>Supervisor Name</th>
							<th>Supervisor Message</th>
						</tr>
                    </thead>
                    <tbody>
                        <?php 
						$sql = mysqli_query($con, "select * from usermessage where email='".$_SESSION['email']."'") ; 
						//This query the usermessage table in the database and selects the message to be displayed to the a particular
						//user with the corresponding email of the session's email 
                        $count = 1;
                        while($row = mysqli_fetch_array($sql)){ //This will loop the user message table and return an array 
                        ?>
                        <tr>
                          <td class="center"><?php echo $count; ?> </td> 
                          <td class="hidden-xs"><?php echo $row['course'];?></td>
						<td><?php echo $row['supname'];?></td>
                        <td><?php echo $row['sup_message'];?> </td>
                        </tr>
                        <?php
                        $count = $count + 1;
                        };?>
                        
                    </tbody>
                </table>
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


