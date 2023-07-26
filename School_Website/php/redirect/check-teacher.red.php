<?php

if(isset($_SESSION['data']['user_type']) === FALSE) {
    echo "not signed in";
    // header("location: index.php");
    // exit();
}

if(isset($_SESSION['onProfile']) === FALSE) {
    if($_SESSION['data']['user_type'] != "teacher" && $_SESSION['data']['user_type'] != "tobe_teacher") {
        echo "not teacher goto profile";
        // header("location: index.php");
        // exit();
    }
} else {
    if($_SESSION['data']['user_type'] != "teacher" && $_SESSION['data']['user_type'] != "tobe_teacher") {
        echo "not teacher goto index";
        // header("location: profile.php");
        // exit();
    }
}