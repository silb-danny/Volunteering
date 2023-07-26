<?php

if(isset($_SESSION['logged_In']) === FALSE) {
    header("location: index.php");
    exit();
}