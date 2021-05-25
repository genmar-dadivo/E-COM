<?php
    require '../dbase/dbconfig.php';
    $sql = "SELECT * FROM adminhome";
    $stm = $con->prepare($sql);
    $stm->execute();
    $results = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($stm->rowCount() >= 1) {
        foreach ($results as $row) {
            $id = $row['id'];
            $type = $row['type'];
            if ($type == 1) { $type = 'Carousel'; }
            elseif ($type == 2) { $type = 'Cards'; }
            else { $type = 'Error'; }
            $title = ucwords(strtolower($row['title']));
            $file = $row['file'];
            $date = date('Y-m-d', strtotime($row['date']));
            $output['data'][] = array(
                "",
                "$type",
                "$title",
                "<i class='fa fa-images'></i>",
                "$date",
                "<i class='fa fa-edit pointer ms-1' onclick='editassethome($id)'></i> <i class='fa fa-trash pointer ms-1' onclick='deleteassethome($id)'></i>"
            );
        }
    }
    else {
        $output['data'][] = array(
            "",
            "No Data",
            "",
            "",
            "",
            ""
        );
    }
    echo json_encode($output);
?>