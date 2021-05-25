<?php
    require '../dbase/dbconfig.php';
    $eventtitle = ucfirst(strtolower($_POST['eventtitle']));
    $announcement = ucfirst(strtolower($_POST['announcement']));
    $sql = "SELECT * FROM announce WHERE title = '$eventtitle' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 0) {
        $sqlannounce = "INSERT INTO announce(title, announcedescription) VALUES ('$eventtitle', '$announcement')";
        $stmannounce = $con->prepare($sqlannounce);
        $stmannounce->execute();
        echo "Announcement inserted.";
    }
    else { echo "Announcement already exist"; }
?>