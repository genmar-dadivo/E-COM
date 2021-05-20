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
						<li class="nav-item me-4">
							<a class="nav-link pointer rounded-top custom-bg-1 text-light" onclick="loadcontent(1)">Home</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link pointer" onclick="loadcontent(2)">Events</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link pointer" onclick="loadcontent(3)">Announcements</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link pointer" onclick="loadcontent(4)">Surveys</a>
						</li>
						<li class="nav-item me-1">
							<a class="nav-link pointer" onclick="loadcontent(5)">Contact Us</a>
						</li>
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
      	<!-- Custom JS -->
      	<script src="assets/js/custom/custom.js"></script>
   	</body>
</html>