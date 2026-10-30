<html>
<title>Material Alert System</title>
<head>
<?php require_once('pages/login_validation.php'); ?>
<?php require_once('pages/get_user_roles.php'); ?>
<?php require_once('libraries/includes.php'); ?>
<input type="hidden" id="hd_username" value="<?php echo $_SESSION['username']; ?>">
<?php
	/* 1 = Material Request Module, 2 = Warehouse Alert Module  */
?>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top topbar">
		<div class="container-fluid">

			<div class="navbar-header">

				<a href="#" class="navbar-brand">
					<span class="hidden-xs">MAS</span>
				</a>

				<p class="navbar-text">
					
				</p>

			</div>

			<div class="navbar-collapse collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="#" class="sidebar-toggle" id="toggle-menu">
							<i class="fa fa-bars"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>