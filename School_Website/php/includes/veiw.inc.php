<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";

$action = $_POST['action'];
$cont = new Users();
if(strpos($action, "t") !== false) { // trash
    $oid = str_replace("t","",$action);
    $id = $_SESSION['data']['user_id'];
    $cont -> deleteTeacher($oid, $id);
    $_SESSION['trash_connection'] = $oid;
    header("location: ../../trash.php");
    exit();
} else if(strpos($action, "s") !== false) { // send mail
    $oid = str_replace("s","",$action);
    $otherUser = $cont -> getUser($oid);

    $sendMail = new Mail();
    $sendMail -> sendData($_SESSION['data']['user_mail'], $otherUser);
}
header("location: ../../veiw.php");
exit();