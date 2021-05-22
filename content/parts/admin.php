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
      	<link href="../../assets/css/bs/bootstrap.min.css" rel="stylesheet">
      	<!-- OS CSS -->
      	<link href="../../assets/css/os/css/OverlayScrollbars.min.css" rel="stylesheet">
        <!-- FA CSS -->
        <link href="../../assets/css/fa/css/fontawesome.min.css" rel="stylesheet">
        <link href="../../assets/css/fa/css/brands.min.css" rel="stylesheet">
        <link href="../../assets/css/fa/css/solid.min.css" rel="stylesheet">
      	<!-- Custom CSS -->
      	<link href="../../assets/css/custom/custom.css" rel="stylesheet">
      	<title> E-COM </title>
	</head>
	<body class="noselect">
      <div class="page-wrapper chiller-theme toggled">
         <a id="show-sidebar" class="btn btn-sm btn-dark" href="#" style="z-index: 999;">
            <i class="fas fa-bars"></i>
         </a>
         <main class="page-content navbar-light">
         </main>
			<nav id="sidebar" class="sidebar-wrapper">
         </nav>
      </div>
      <input type="text" id="adminbodyid" value="">
		<!-- Bootstrap JS -->
      <script src="../../assets/js/bs/bootstrap.min.js"></script>
      <!-- JQuery -->
      <script src="../../assets/js/jquery/jquery-3.5.1.min.js"></script>
      <!-- OS JS -->
      <script src="../../assets/js/os/OverlayScrollbars.min.js"></script>
      <script src="../../assets/js/os/jquery.overlayScrollbars.min.js"></script>
      <!-- Popper JS -->
      <script src="../../assets/js/popper/popper.min.js"></script>
      <!-- Push JS -->
      <script src="../../assets/js/push/push.min.js"></script>
      <!-- Input Masking JS -->
      <script src="../../assets/js/ib/inputmask.min.js"></script>
      <script src="../../assets/js/ib/jquery.inputmask.min.js"></script>
      <script src="../../assets/js/ib/bindings/inputmask.binding.js"></script>
      <!-- Cookie JS -->
      <script src="../../assets/js/cookie/js.cookie.min.js"></script>
      <!-- Cookie JS -->
      <script src="../../assets/js/notify/bootstrap-notify.min.js"></script>
      <!-- Custom JS -->
      <script src="../../assets/js/custom/custom.js"></script>
	</body>
</html>