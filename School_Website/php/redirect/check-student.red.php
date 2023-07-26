<?php

if(isset($_SESSION['data']['user_type']) === FALSE) {
    header("location: index.php");
    exit();
}

if(isset($_SESSION['onProfile']) === FALSE) {
    if($_SESSION['data']['user_type'] != "student") {
        header("location: index.php");
        exit();
    }
} else {
    if($_SESSION['data']['user_type'] != "student") {
        header("location: profile.php");
        exit();
    }
}
