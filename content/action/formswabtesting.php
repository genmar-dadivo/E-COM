<?php
    require '../dbase/dbconfig.php';
    date_default_timezone_set("Asia/Manila");
    $datesent = date('Y-m-d h:s:i');
    $temperature = $_POST['temperature'];
    $age = $_POST['age'];
    $user = $_POST['user'];
    $gender = $_POST['gender'];
    if (isset($_POST['fever'])) { $fever = $_POST['fever']; }
    else { $fever = 0; }
    if (isset($_POST['cough'])) { $cough = $_POST['cough']; }
    else { $cough = 0; }
    if (isset($_POST['sorethroat'])) { $sorethroat = $_POST['sorethroat']; }
    else { $sorethroat = 0; }
    if (isset($_POST['shortnessofbreath'])) { $shortnessofbreath = $_POST['shortnessofbreath']; }
    else { $shortnessofbreath = 0; }
    if (isset($_POST['lossofsmellandtaste'])) { $lossofsmellandtaste = $_POST['lossofsmellandtaste']; }
    else { $lossofsmellandtaste = 0; }
    if (isset($_POST['fatigue'])) { $fatigue = $_POST['fatigue']; }
    else { $fatigue = 0; }
    if (isset($_POST['achesandpain'])) { $achesandpain = $_POST['achesandpain']; }
    else { $achesandpain = 0; }
    if (isset($_POST['runnynose'])) { $runnynose = $_POST['runnynose']; }
    else { $runnynose = 0; }
    if (isset($_POST['diarrhea'])) { $diarrhea = $_POST['diarrhea']; }
    else { $diarrhea = 0; }
    if (isset($_POST['headache'])) { $headache = $_POST['headache']; }
    else { $headache = 0; }
    $responce = "$fever,$cough,$sorethroat,$shortnessofbreath,$lossofsmellandtaste,$fatigue,$achesandpain,$runnynose,$diarrhea,$headache";
    // SUBID ID OF ACTIONTYPE
    // ACTION TYPE
    // AT 1 = SURVEY
    // AT 2 = NOTIFICATION 
    $sql = "INSERT INTO actionlog (subid, actiontype, user, actionlog, datesent) VALUES (1, 1, '$user', '$responce', '$datesent')";
    $stm = $con->prepare($sql);
    $stm->execute();
    if ($stm->rowCount() == 1) { echo "Answer submitted."; }
    else { echo "Error Occured."; }
?>