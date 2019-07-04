<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
<div class="navbar-header">
	<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
		<i class="ti-align-justify"></i>
	</a>
	<a class="navbar-brand" href="#">
		<h2 style="padding-top:2% ">P.A.S</h2>
	</a>
	<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
		<i class="ti-align-justify"></i>
	</a>
	<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<i class="ti-view-grid"></i>
	</a>
</div>
<!-- end: NAVBAR HEADER -->
<!-- start: NAVBAR COLLAPSE -->
<div class="navbar-collapse collapse">
	<ul class="nav navbar-right">
		<!-- start: MESSAGES DROPDOWN -->
			<li  style="padding-top:2% ">
			<h2>Project Appointment System</h2>
		</li>
						
						
	<li class="dropdown current-user">
		<a href class="dropdown-toggle" data-toggle="dropdown">
		<?php 
			$query = mysqli_query($con,"SELECT * FROM users WHERE email='".$_SESSION['email']."'");
			$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);				
			
		?> 
		<?php foreach($rows as $row); ?>
		<img src="images/<?php echo $row['profile_pic']; ?> " alt="Picture"><span class="username">
		
		

			<?php 
			$query = mysqli_query($con,"SELECT fullName FROM users WHERE email='".$_SESSION['email']."'");
			while($row=mysqli_fetch_array($query))
			{
				echo $row['fullName'];
			}
			?> 
			<i class="ti-angle-down"></i></i></span>
		</a>
		<ul class="dropdown-menu dropdown-dark">
			<li>
				<a href="edit-profile.php">
					My Profile
				</a>
			</li>
		
			<li>
				<a href="change-password.php">
					Change Password
				</a>
			</li>
			<li>
				<a href="logout.php">
					Log Out
				</a>
			</li>
		</ul>
	</li>

	</ul>
	
	<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
	<div class="arrow-left"></div>
	<div class="arrow-right"></div>
	</div>

	</div>


	
	</header>
