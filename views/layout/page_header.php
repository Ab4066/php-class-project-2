<?php  
    include('../../config/database/connection.php');

	$person = $connection->query("SELECT * FROM personal_info LIMIT 1 ");
    $my = $person->fetch_assoc();


    $contacts = $connection->query("SELECT count(c_id) AS contact FROM contactus ");
    $cont = $contacts->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $my['firstname']." Admin Panel"; ?></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/lib/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main-style.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome/css/font-awesome.min.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	
	<div class="container-fluid display-table">
		<div class="row display-table-row">
			<!-- sidebar -->
			<div id="side-menu" class="col-md-2 col-sm-2 col-xs-2 display-table-cell" >
			    
				<h2 class="text-center hidden-xs hidden-sm">
					<a href="index.php"><img src="../../img/logo.png" alt=""></a>
				</h2>
				<ul id="nav-side">
					<li class="link">
						<a href="../../index.php">
							<span class="fa fa-home" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Website</span>
						</a>
					</li>
					<li class="link">
						<a href="../dashboard/home.php">
							<span class="fa fa-bar-chart-o" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Statistics</span>
						</a>
					</li>
					<li class="link">
						<a href="../dashboard/myprofile.php">
							<span class="fa fa-user" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;My Profile</span>
						</a>
					</li>
					<li class="link">
						<a href="../dashboard/post_list.php">
							<span class="fa fa-list" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Posts</span>
						</a>
					</li>
					<li>
						<a href="../dashboard/contact.php">
							<span class="fa fa-phone" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Contacts</span>
						</a>
					</li>
					<li>
						<a href="../user/user_list.php">
							<span class="fa fa-user" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Manage Acount</span>
						</a>
					</li>
				</ul>
					<hr>
				<ul>
					<li>
						<a href="../dashboard/help.php">
							<span class="fa fa-question-circle" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Help</span>
						</a>
					</li>
					<li>
						<a href="../user/logout.php">
							<span class="fa fa-sign-out" aria-hidden="true"></span>
							<span class="hidden-sm hidden-xs">&nbsp;&nbsp;Sign out</span>
						</a>
					</li>
				</ul>

			</div>
			<!-- end sidebar -->

			<!-- content -->
			<div class="col-md-10 col-sm-10 col-xs-10 display-table-cell content">
				<div class="row">
					<header id="nav-header" class="clearfix">
					<div class="col-md-5 hidden-sm hidden-xs">
						<input type="text" id="header-search" name="search" placeholder="Search...">
					</div>
					<div class="col-md-7 col-xs-12">
						<ul class="pull-right">
							<li id="welcome" class="hidden-sm hidden-xs">Welcome to your Administrator</li>
							<li class="fixed-width">
								<a href="#">
									<span class="fa fa-bell" aria-hidden="true"></span>
									<span class="label label-warning">
									</span>
								</a>
							</li>
							<li class="fixed-width">
								<a href="#">
									<span class="fa fa-envelope" aria-hidden="true"></span>
									<span class="label label-success">
										<?php echo $cont['contact']; ?>
									</span>
								</a>
							</li>
							<li >
								<a href="../user/logout.php" class="logout">
									<span class="fa fa-sign-out" aria-hidden="true"></span>
									<span>Logout&nbsp;&nbsp;</span>
								</a>
							</li>
						</ul>
					</div>
					</header>
				</div>
