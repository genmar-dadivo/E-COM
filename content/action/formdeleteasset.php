<?php
    require '../dbase/dbconfig.php';
    $assetid = $_POST['assetid'];
    // DELETE IMAGE
    $sqlimg = "SELECT file FROM adminhome WHERE id = '$assetid' ";
    $stmimg = $con->prepare($sqlimg);
	$stmimg->execute();
    $row = $stmimg->fetch();
    $file = $row['file'];
    unlink("../../assets/img/home/" . $file);
    // DELETE RECORD
    $sql = "DELETE FROM `adminhome` WHERE id = '$assetid' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 1) { echo "Asset deleted."; }
    else { echo "Error occured."; }
?>