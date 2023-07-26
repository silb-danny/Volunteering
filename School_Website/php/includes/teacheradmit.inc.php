<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";

$cont = new Users();
$users = $cont ->getAlltobe();
for ($i=0; $i < sizeof($users); $i++) { 
    $id = $_POST[$i];
    if(strpos($id,"t") !== false) { // trash
        $id = str_replace("t","",$id);
        $cont -> deleteUser($id);
        // echo 'delete '.$id;
    } else if(strpos($id,"a") !== false) { // apply
        $id = str_replace("a","",$id);
        $cont -> updateTeacher($id);
        // echo 'apply '.$id;
    }
}
header('location: ../../profile.php');
exit();