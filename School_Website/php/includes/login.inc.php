<?php

if (isset($_POST['loggedIn'])) {
    session_start();
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    include_once "class-autoload.inc.php";

    $tstObj = new UsersContr();
    $tstObj-> loginUser($email, $pwd);
    

}
else {
    header("location: ../../index.php");
    exit();
}