<?php
    require '../dbase/dbconfig.php';
    $fname = ucwords(preg_replace("/[^A-Za-z Ññ\-\']/", '', $_POST['fname']));
    $pword = hash('md5', preg_replace('/[^0-9A-Za-zA-Z!@#$%^&*()]/', '', $_POST['pword']));
    $email = preg_replace("/[^A-Za-z0-9.@\-\']/", '',$_POST['email']);
    $address = $_POST['address'];
    $code = preg_replace("/[^A-Za-z0-9@\-\']/", '',$_POST['code']);
    if (strpos($code, '-02') !== false) { $level = 1; }
    else { $level = 2; }
    $codes = array('staff001','staff002','staff003','staff004','staff005','staff006','staff007','staff008','staff009','staff-02');
    if (in_array($code ,$codes)) {
        $sql = "SELECT * FROM tuser WHERE email = '$email' ";
        $stm = $con->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            $sql = "INSERT INTO tuser (fname, pword, email, address, lvl) VALUES ('$fname', '$pword', '$email', '$address', '$level')";
            $stm = $con->prepare($sql);
            $stm->execute();
            echo "Account registered.";
        }
        else { echo "Email already exist."; }
    }
    else { echo "You're not authorized to this action."; }
?>