<?php
    require '../dbase/dbconfig.php';
    $tannounce = $_POST['tannounce'];
    // DELETE RECORD
    $sql = "DELETE FROM `announce` WHERE id = '$tannounce' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 1) { echo "Announcement deleted."; }
    else { echo "Error occured."; }
?>