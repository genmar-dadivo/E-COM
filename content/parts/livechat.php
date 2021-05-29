<?php
    session_start();
    date_default_timezone_set("Asia/Manila");
    $datetimenow = date('YmdHis');
    $ecom_auth = $_SESSION['ecom_auth'];
    $r = $_GET['r'];
    $rpieces = explode(",", $r);
    $concerntype = $rpieces[0];
    if ($concerntype == 1) { $concern = 'Report'; }
    elseif ($concerntype == 2) { $concern = 'Emergency'; }
    elseif ($concerntype == 3) { $concern = 'Feedbacks'; }
    elseif ($concerntype == 4) { $concern = 'Others'; }
    $ref = $rpieces[1];
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
      	<!-- Custom CSS -->
      	<link href="../../assets/css/custom/custom.css" rel="stylesheet">
      	<title> E-COM </title>
   	</head>
   	<body class="noselect" style="background-color: rgb(194, 194, 194);">
        <div class="container">
            <div class="card border-0 shadow-sm mt-5 rounded-end">
                <div class="card-header"> <?php echo $concern; ?> </div>
                <input type="text" id="r" class="hidden" value="<?php echo $r; ?>">
                <input type="text" id="user" class="hidden" value="<?php echo $_SESSION['ecom_auth']; ?>">
                <div class="card-body" style="min-height: 400px; max-height: 400px; overflow-x: scroll;" id="livechatcontent">
                </div>
                <div class="card-footer">
                    <form id="formLivechat">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="hidden" name="user" value="<?php echo $_SESSION['ecom_auth']; ?>">
                                        <input type="text" class="hidden" name="ref" value="<?php echo $r; ?>">
                                        <textarea class="form-control border-0" placeholder="Message" name="response" id="response" style="height: 90px; resize: none; background-color: rgb(221, 221, 221);"></textarea>
                                        <label for="response">Message</label>
                                    </div>
                                </div>
                                <div class="col-sm-1 mx-auto">
                                    <button class="btn btn-primary" type="submit" role="button"> Send </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="height: 10px;"></div>
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