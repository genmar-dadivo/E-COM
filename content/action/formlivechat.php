<?php
require '../dbase/dbconfig.php';
date_default_timezone_set("Asia/Manila");
if(isset($_GET['i'])) {
    $datenow = date('YmdHis');
    $datenowref = date('Y-m-d H:i: s');
    $user = $_POST['user'];
    $lcconcerncategory = $_POST['lcconcerncategory'];
    $reference = $lcconcerncategory . "," . $user . $datenow;
    $lcdetailsfield = preg_replace('/[^0-9A-Za-zA-Z Ññ.,!@#$%^&*()]/', '', ucfirst(strtolower($_POST['lcdetailsfield'])));
    // USER RESPO
    $sql = "INSERT INTO livechat (reference, user, staff, content, datesent) VALUES ('$reference', '$user', '', '$lcdetailsfield', '$datenowref')";
    $stm = $con->prepare($sql);
	$stm->execute();
    // AUTOMATED
    $sqlauto = "INSERT INTO livechat (reference, user, staff, content, datesent) VALUES ('$reference', 'Automated', '', 'Wait for the representative to reply.', '$datenowref')";
    $stmauto = $con->prepare($sqlauto);
	$stmauto->execute();
    if ($stmauto->rowCount() == 1) { echo $reference; }
    else { echo "Error occured."; }
}
elseif (isset($_GET['r'])) {
    $userlogin = $_GET['user'];
    $r = $_GET['r'];
    $rpieces = explode(",", $r);
    $concerntype = $rpieces[0];
    if ($concerntype == 1) { $concern = 'Report'; }
    elseif ($concerntype == 2) { $concern = 'Emergency'; }
    elseif ($concerntype == 3) { $concern = 'Feedbacks'; }
    elseif ($concerntype == 4) { $concern = 'Others'; }
    $ref = $rpieces[1];
    $sql = "SELECT * FROM livechat WHERE reference = '$r' ";
    $stm = $con->prepare($sql);
	$stm->execute();
    if ($stm->rowCount() >= 1) {
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $id = $row['id'];
            $reference = $row['reference'];
            $user = $row['user'];
            $staff = $row['staff'];
            $content = $row['content'];
            $datesent = $row['datesent'];
            if ($user == $userlogin) { $class = "right"; $darker = ''; }
            else { $class = "left"; $darker = 'darker';}
        ?>
        <div class="lcbody <?php echo $darker; ?>">
            <img src="../../assets/img/user.jpg" alt="Avatar" class="<?php echo $class; ?>">
            <p>
                <?php echo $content; ?>
            </p>
            <span class="time-<?php echo $class; ?>"> <?php echo date('Y-m-d H:s', strtotime($datesent)); ?> </span>
        </div>
        <?php
        }
    }
    else { echo "Error occured."; }
}
elseif (isset($_GET['lc'])) {
    $datenow = date('Y-m-d H:i:s');
    $user = $_POST['user'];
    $ref = $_POST['ref'];
    $response = $_POST['response'];
    $sql = "INSERT INTO livechat (reference, user, content, datesent) VALUES ('$ref', '$user', '$response', '$datenow')";
    $stm = $con->prepare($sql);
	$stm->execute();
}
?>