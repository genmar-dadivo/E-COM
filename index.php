<?php
    session_start();
    date_default_timezone_set("Asia/Manila");
    $datetimenow = date('YmdHis');
?>
<!doctype html>
<html lang="en">
   <head>
    	<meta charset="utf-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<!-- Bootstrap CSS -->
      	<link href="assets/css/bs/bootstrap.min.css" rel="stylesheet">
      	<!-- OS CSS -->
      	<link href="assets/css/os/css/OverlayScrollbars.min.css" rel="stylesheet">
      	<!-- Custom CSS -->
      	<link href="assets/css/custom/custom.css" rel="stylesheet">
      	<title> E-COM </title>
   	</head>
   	<body class="noselect" style="background-color: rgb(240, 240, 240);">
    	<nav class="navbar navbar-expand-lg navbar-light text-light">
        	<div class="container">
            	<a class="navbar-brand">
            		<img src="assets/img/logo.png" alt="" width="50" height="50">
            		E-COM
            	</a>
            	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            		<span class="navbar-toggler-icon"></span>
            	</button>
            	<div class="collapse navbar-collapse" id="navbarNav">
					<div class="navbar-nav me-auto">
					</div>
					<ul class="navbar-nav">
						<li class="nav-item me-3">
							<a class="nav-link pointer rounded-top custom-bg-1 text-light" onclick="loadcontent(1)">Home</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link pointer" onclick="loadcontent(2)">Events</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link pointer" onclick="loadcontent(3)">Announcements</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link pointer" onclick="loadcontent(4)">Surveys</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link pointer" onclick="loadcontent(5)">Contact Us</a>
						</li>
						<?php
							if (isset($_SESSION['ecom_auth']) ) {
						?>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Notification
							</a>
							<ul class="dropdown-menu border-0" aria-labelledby="navbarDropdown">
								<li>
									<a class="dropdown-item pointer"> Title </a>
								</li>
							</ul>
						</li>
						<?php
							require 'content/dbase/dbconfig.php';
							$email = $_SESSION['ecom_auth'];
							$sql = "SELECT lvl FROM tuser WHERE email = '$email'";
							$stm = $con->prepare($sql);
							$stm->execute();
							$row = $stm->fetch();
							$lvl = $row['lvl'];
						?>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Account
							</a>
							<ul class="dropdown-menu border-0" aria-labelledby="navbarDropdown">
								<li>
									<a class="dropdown-item" href="#" onclick="loadcontent(6)">Profile</a>
								</li>
								<?php if ($lvl == 0) { ?>
								<li>
									<a class="dropdown-item" href="#" onclick="loadcontent(7)">Admin</a>
								</li>
								<?php 
									} 
									elseif ($lvl == 1) {
								?>
								<li>
									<a class="dropdown-item" href="#" onclick="loadcontent(7)"> Concerns </a>
								</li>
								<?php } ?>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<a class="dropdown-item" href="#" onclick="logout()">Logout</a>
								</li>
							</ul>
						</li>
						<?php }
							else {
						?>
						<li class="nav-item me-1 login">
							<a class="nav-link pointer" onclick="login()">Login</a>
						</li>
						<?php } ?>
					</ul>
				</div>
         	</div>
      	</nav>
		<main class="page-content navbar-light h-100">
			<div id="page-content"></div>
		</main>
		<div id="ids" class="hidden">
			<input id="bodyid">
		</div>
		<!-- <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"> -->
		<div class="modal fade" id="login" tabindex="-1">
			<div class="modal-dialog">
			  	<div class="modal-content">
					<div class="login-page">
						<img src="assets/img/logo.png" class="rounded mx-auto d-block" style="height: 100px;">
						<div class="form">
							<form class="register-form intlogin" id="formRegister">
								<input type="text" class="text-capitalize letteronly" name="fname" placeholder="Full Name" autocomplete="off" required>
								<input type="password" name="pword" placeholder="Password" maxlength="16" autocomplete="off" required>
								<input type="email" name="email" class="emailadd" autocomplete="off" placeholder="Email Address" required>
								<textarea name="address" class="text-capitalize" autocomplete="off" placeholder="Address" required></textarea>
								<input type="text" name="code" autocomplete="off" placeholder="Code" maxlength="8" minlength="8" required>
								<button type="submit" id="btnCreate"> Create </button>
								<p class="message">Already registered? <a href="#">Sign In</a></p>
							</form>
							<form class="login-form intlogin" id="formLogin">
								<input type="text" name="email" autocomplete="off" placeholder="Email Address" class="emailadd" required>
								<input type="password" name="pword" placeholder="Password" autocomplete="off" required>
								<button id="btnLogin"> Login </button>
								<p class="message">Not registered? <a href="#">Create an account</a></p>
							</form>
						</div>
					</div>
			  	</div>
			</div>
		</div>
      	<!-- Bootstrap JS -->
      	<script src="assets/js/bs/bootstrap.min.js"></script>
      	<!-- JQuery -->
      	<script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
      	<!-- OS JS -->
      	<script src="assets/js/os/OverlayScrollbars.min.js"></script>
      	<script src="assets/js/os/jquery.overlayScrollbars.min.js"></script>
      	<!-- Popper JS -->
      	<script src="assets/js/popper/popper.min.js"></script>
      	<!-- Push JS -->
      	<script src="assets/js/push/push.min.js"></script>
      	<!-- Input Masking JS -->
      	<script src="assets/js/ib/inputmask.min.js"></script>
      	<script src="assets/js/ib/jquery.inputmask.min.js"></script>
      	<script src="assets/js/ib/bindings/inputmask.binding.js"></script>
      	<!-- Cookie JS -->
      	<script src="assets/js/cookie/js.cookie.min.js"></script>
		<!-- Cookie JS -->
      	<script src="assets/js/notify/bootstrap-notify.min.js"></script>
      	<!-- Custom JS -->
      	<script src="assets/js/custom/custom.js"></script>
   	</body>
</html>