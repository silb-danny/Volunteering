<?php
    include "component/header.php";
    include_once "php/redirect/logged-in.red.php";
    include_once "php/includes/class-autoload.inc.php";

    $data = $_SESSION['data'];
    $name = $data['user_name']; // name
    $mail = $data['user_mail']; // mail
    $phone = $data['user_phone']; // phone
    $type = $data['user_type']; // type
    $grade = $data['user_grade']; // grade
    $subjectNames = $data['subjects'];
    $profile = new Profile();

    if($type == "student") {
        $profile->showStudentProfile($name, $mail, $grade, $phone, $subjectNames);
    } else if($type == "tobe_teacher" || $type == "teacher") {
        $profile->showTeacherProfile($name, $mail, $grade, $phone, $subjectNames);
    } else if($type == "admin") {
        $profile->showAdminProfile();
    }

    $_SESSION['onProfile'] = "onProfile";
    include "component/footer.php";
?>