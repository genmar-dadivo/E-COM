<?php
    require '../dbase/dbconfig.php';
    $fname = ucwords(preg_replace("/[^A-Za-z Ññ\-\']/", '', $_POST['fname']));
    $pword = hash('md5', preg_replace('/[^0-9A-Za-zA-Z!@#$%^&*()]/', '', $_POST['pword']));
    $email = preg_replace("/[^A-Za-z0-9@\-\']/", '',$_POST['email']);
    $address = $_POST['address'];
    $code = preg_replace("/[^A-Za-z0-9@\-\']/", '',$_POST['code']);
    $codes = array('aGh0ckgH','W72mIX94','bW9pWrjs','cAckPVVS','MFSkFrey','28SWBzfC','RkNTQGlH','P4rLjvro','98YRtRdI','kaJzUPoz');
    if (in_array($code ,$codes)) {
        $sql = "SELECT * FROM tuser WHERE email = '$email' ";
        $stm = $con->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            $sql = "INSERT INTO tuser (fname, pword, email, address) VALUES ('$fname', '$pword', '$email', '$address')";
            $stm = $con->prepare($sql);
            $stm->execute();
            echo "Account registered.";
        }
        else { echo "Email already exist."; }
    }
    else { echo "You're not authorized to this action."; }
?>