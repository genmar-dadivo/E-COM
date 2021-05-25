<?php
    require '../dbase/dbconfig.php';
    $eventid = $_POST['eventid'];
    // DELETE RECORD
    $sql = "DELETE FROM `events` WHERE id = '$eventid' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 1) { echo "Event deleted."; }
    else { echo "Error occured."; }
?>