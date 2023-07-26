<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";


$cont = new Users();
$tid = $_POST['picked'];
$id = $_SESSION['data']['user_id'];

$cont ->addStudent($tid, $id);
$teacher = $cont -> getUser($tid);

$student = $_SESSION['data'];

$sendMail = new Mail();
$sendMail -> sendDataAddingTeacher($student, $teacher);

header("location: ../../teacherFind.php");
exit();