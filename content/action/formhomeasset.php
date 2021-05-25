<?php
    require '../dbase/dbconfig.php';
    date_default_timezone_set("Asia/Manila");
    require '../dbase/dbconfig.php';
    $datenow = date('Y-m-d');
    $assettype = $_POST['assettype'];
    if(isset($_POST['showhide'])) { $showhide = 1; }
    else { $showhide = 0; }
    $assettitle = ucwords(strtolower($_POST['assettitle']));
    if(isset($_POST['assetdescription'])) { $assetdescription = $_POST['assetdescription']; }
    else { $assetdescription = 'N/A'; }
    if ($assettype == 1) {
        if (isset($_FILES['assetfile'])) {
            $assetfile = $_FILES['assetfile'];
            $target_dir = "../../assets/img/home/";
            $temp = explode(".", $_FILES["assetfile"]["name"]);
            $renamemecha = strtolower(preg_replace('/\s+/', '', $assettitle)) . '.' . end($temp);
            $assetfile = $renamemecha;
            $target_file = $target_dir . $renamemecha;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["assetfile"]["tmp_name"]);
            if ($check !== false) { $uploadOk = 1; }
            else { $uploadOk = 0; }
            if (file_exists($target_file)) { unlink($target_file); }
            if ($_FILES["assetfile"]["size"] > 1000000) { $uploadOk = 0; }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) { $uploadOk = 0; }
            if ($uploadOk == 0) { echo "Sorry, your file was not uploaded."; }
            else {
                if (move_uploaded_file($_FILES["assetfile"]["tmp_name"], $target_file)) {
                    //echo "Image Uploaded.";
                }
                else { echo "Sorry, there was an error uploading your file."; }
            }
        }
        echo "Asset added.";
    }
    else { $assetfile = 'NA'; }
    $sql = "SELECT * FROM adminhome WHERE title = '$assettitle' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() == 0) {
        $sqledata = "INSERT INTO adminhome(`type`, `title`, `file`, `date`, `status`, `assetdescription`) 
        VALUES ('$assettype', '$assettitle', '$assetfile', '$datenow', '$showhide', '$assetdescription')";
        $stmedata = $con->prepare($sqledata);
        $stmedata->execute();
    }
    else { echo "Error Occured."; }
?>