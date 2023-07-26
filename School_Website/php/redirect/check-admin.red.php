<?php

if(isset($_SESSION['data']['user_type']) === FALSE) {
    header("location: index.php");
    exit();
}

if($_SESSION['data']['user_type'] != "admin") {
    header("location: index.php");
    exit();
}