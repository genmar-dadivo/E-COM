<?php
    date_default_timezone_set("Asia/Manila");
    require '../dbase/dbconfig.php';
    $daterequest = date('Y-m-d');
    $eventtitle = $_POST['eventtitle'];
    $eventcolor = $_POST['eventcolor'];
    $eventdesc = $_POST['eventdesc'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $eventtitle = $_POST['eventtitle'];
    $sql = "SELECT * FROM events WHERE title = '$eventtitle'";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 0) {
        $sqlevent = "INSERT INTO events(title, color, eventdescription, starttime, endtime, datesent) VALUES ('$eventtitle', '$eventcolor', '$eventdesc', '$stime', '$etime', '$daterequest')";
        $stmevent = $con->prepare($sqlevent);
        $stmevent->execute();
        echo "Event inserted.";
    }
    else { echo "Event already exist"; }
?>