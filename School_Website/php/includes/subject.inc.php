<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";
include_once "functions.inc.php";

$subjects = setSubjects();
$tstObj = new Users();
$s = subjectNames($_SESSION['data']);
$_SESSION['data']['subjects'] = $s;
if(sizeof($s) > 0) {
    if($tstObj->emailExists($_SESSION['data']['user_mail']) !== false) {
        $id = $_SESSION['data']['user_id'];
        $tstObj->updateSubjects($subjects , $id);
    } else {
        $tstObj->createUser($_SESSION['data']['user_name'], $_SESSION['data']['user_mail'], $_SESSION['data']['user_phone'], $_SESSION['data']['user_grade'], $_SESSION['data']['user_type'], $_SESSION['data']['user_password'], $subjects);
    }
} else {
    header("location: ../../profile.php");
    exit();
}
if($_SESSION['data']['user_type'] == "student") {
    if(isset($_SESSION['onProfile'])) {
        header("location: ../../profile.php");
    } else {
        header("location: ../../teacherFind.php");
    }
    exit();
} else {
    header("location: ../../teacherbio.php");
    exit();
}