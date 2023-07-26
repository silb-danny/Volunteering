<?php

class UsersContr extends Users {

    public function loginUser($email, $pwd) {
        $emailExists = $this->emailExists($email);
    
        if($emailExists === false) {
            header("location: ../../index.php?error=wrongemail");
            exit();
        }

        $pwdHased = $emailExists["user_password"];
        $checkPwd = password_verify($pwd, $pwdHased);
        if($checkPwd === false) {
            header("location: ../../index.php?error=wrongpwd");
            exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION['data'] = $emailExists;
            include_once "../includes/functions.inc.php";
            $s = subjectNameslog($_SESSION['data']);
            $_SESSION['data']['subjects'] = $s;
            $_SESSION['logged_In'] = 1;
            header("location: ../../profile.php");
            exit();
        }
    }
    
}