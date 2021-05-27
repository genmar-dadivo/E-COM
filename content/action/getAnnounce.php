<?php
    require '../dbase/dbconfig.php';
    $sql = "SELECT * FROM announce";
    $stm = $con->prepare($sql);
    $stm->execute();
    $results = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($stm->rowCount() >= 1) {
        foreach ($results as $row) {
            $id = $row['id'];
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            $announcedescription = $row['announcedescription'];
            $output['data'][] = array(
                "",
                "$title",
                "$subtitle",
                "$announcedescription",
                "<i class='fa fa-trash pointer' onclick='deleteannouncement($id)'></i>",
            );
        }
    }
    else {
        $output['data'][] = array(
            "",
            "No Data",
            "",
            "",
            ""
        );
    }
    echo json_encode($output);
?>