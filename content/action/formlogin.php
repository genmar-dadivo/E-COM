<?php
    require '../dbase/dbconfig.php';
    $email = preg_replace("/[^A-Za-z0-9.@\-\']/", '',$_POST['email']);
    $pword = hash('md5', preg_replace('/[^0-9A-Za-zA-Z!@#$%^&*()]/', '', $_POST['pword']));
    $sql = "SELECT * FROM tuser WHERE email = '$email' AND pword = '$pword' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 1) {
        $sqlupdatestat = "UPDATE tuser SET status = 1 WHERE email = '$email' AND pword = '$pword' ";
        $stmupdatestat = $con->prepare($sqlupdatestat);
        $stmupdatestat->execute();
        session_start();
        $_SESSION['ecom_auth'] = $email;
        echo "Logging In.";
    }
    else { echo "Invalid user."; }
?>