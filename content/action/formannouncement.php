<?php
    require '../dbase/dbconfig.php';
    $eventtitle = ucfirst(strtolower(preg_replace('/[^0-9A-Za-zA-Z !@#$%^&*()]/', '', $_POST['eventtitle'])));
    $eventsubtitle = ucfirst(strtolower(preg_replace('/[^0-9A-Za-zA-Z !@#$%^&*()]/', '', $_POST['eventsubtitle'])));
    $announcement = ucfirst(strtolower(preg_replace('/[^0-9A-Za-zA-Z !@#$%^&*()]/', '', $_POST['announcement'])));
    $sql = "SELECT * FROM announce WHERE title = '$eventtitle' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 0) {
        $sqlannounce = "INSERT INTO announce(title, subtitle, announcedescription) VALUES ('$eventtitle', '$eventsubtitle', '$announcement')";
        $stmannounce = $con->prepare($sqlannounce);
        $stmannounce->execute();
        echo "Announcement inserted.";
    }
    else { echo "Announcement already exist"; }
?>