<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";

if(isset($_POST['delCon'])) {
    $id = $_POST['delCon'];
    $subject = $_POST['subject'];
    $message = $_POST['main'];

    $cont = new Users();
    $otherUser = $cont -> getUser($id);
    $mail = $otherUser['user_mail'];

    $sendMail = new Mail();
    $sendMail -> connection_removed($mail, $subject, $message);

    header("location: ../../veiw.php");
    exit();
    
} else {
    header("location: ../../profile.php");
}

