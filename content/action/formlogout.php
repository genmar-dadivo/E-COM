<?php
	session_start();
	if(isset($_SESSION['ecom_auth'])) {
		unset($_SESSION['ecom_auth']);
		echo "Logging out";
	}
	else { echo "Logging out"; }
?>