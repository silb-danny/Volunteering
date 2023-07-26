<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";


$subjectsNames = array();
$subjectsAv = array();

for ($i=1; $i <= 19; $i++) { 
    if(isset($_POST['sub'.$i.'av'])) {
        $subjectsAv['sub'.$i.'_av'] = $_POST['sub'.$i.'av'];
        $subjectsNames['sub'.$i.'_name'] = $_POST['sub'.$i.'name'];
    } else {
        $subjectsAv['sub'.$i.'_av'] = null;
        $subjectsNames['sub'.$i.'_name'] = null;
    }
}
$tstObj = new Users();
$id = $_SESSION['data']['user_id'];
if(sizeof($_SESSION['data']['subjects']) > 0) {
    if($tstObj->idExists($id) !== false) {
        $tstObj -> updateBio($subjectsNames, $subjectsAv, $id);
    } else {
        $tstObj -> createBio($subjectsNames, $subjectsAv, $id);
    }
}


header("location: ../../profile.php");
exit();