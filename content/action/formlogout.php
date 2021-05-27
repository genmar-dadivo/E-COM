<?php
	session_start();
	require '../dbase/dbconfig.php';
	if(isset($_SESSION['ecom_auth'])) {
		$ecom_auth = $_SESSION['ecom_auth'];
		$sql = "UPDATE tuser SET status = 0 WHERE email = '$ecom_auth' ";
        $stm = $con->prepare($sql);
        $stm->execute();
		unset($_SESSION['ecom_auth']);
		echo "Logging out";
	}
	else { echo "Logging out"; }
?>