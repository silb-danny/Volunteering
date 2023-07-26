<?php
session_start();
include_once "../redirect/logged-in.inc.red.php";
include_once "class-autoload.inc.php";

$search = "";
if(isset($_POST['search'])) { // admin search
    $search = $_POST['search'];
} else { // delet user
    $cont = new Users();
    $id = $_POST['delet'];
    $cont -> deleteUser($id);
}
header('location: ../../userSearch.php?search='.$search);
exit();
