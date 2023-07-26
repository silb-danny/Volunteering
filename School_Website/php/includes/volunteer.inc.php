<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
require_once 'functions.inc.php';
include_once "class-autoload.inc.php";

$studentName = $_POST['student'];
$hours = $_POST['hour'];
$date = $_POST['date'];

if(!is_numeric($hours) || $hours == 0 || $date == "" || $date == null) {
    header("location: ../../volunteer.php?error=wrongin");
    exit();
}
$cont = new Users();
$id = $_SESSION['data']['user_id'];

echo $date;
$cont -> addVolunteerSession($id, $studentName, $date, (int) $hours);

header("location: ../../volunteer.php");
exit();

