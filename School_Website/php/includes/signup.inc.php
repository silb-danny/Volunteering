<?php

if (isset($_POST['loggedIn'])) {
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $grade = (int) $_POST['grade'];
    $type = $_POST['type'];
    $phone = $_POST['phone'];

    session_start();
    $data = array('user_name' => $name, 'user_mail' => $email, 'user_phone' => $phone, 'user_type' => $type, 'user_grade' => $grade, 'user_password' => $pwd);
    $_SESSION['data'] = $data;

    require_once 'functions.inc.php';
    include_once "class-autoload.inc.php";
    
    $tstObj = new Users();

    if(invalidEmail($email)){
        header("location: ../../signup.php?error=emailinvalid");
        exit();
    }
    if($tstObj->emailExists($email) !== false){
        header("location: ../../signup.php?error=emailtaken");
        exit();
    }
    $_SESSION['logged_In'] = 1;
    header("location: ../../subject.php");
    
    // $tstObj->createUser($name, $email, $date, $pwd);
} else {
    header("location: ../../signup.php");
    exit();
}