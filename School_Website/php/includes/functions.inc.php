<?php

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function subjectNames($data){
    $subjectNames = array();
    foreach ($data['mysubjects'] as $sub => $value) {
        if($value == "1") {
            $subjectNames[$sub] =  $_SESSION['subjects'][$sub];
        }
    }
    return $subjectNames;
}
function subjectNameslog($data){
    $subjectNames = array();
    for ($i = 1; $i <= 19; $i++) { 
        if($data[$sub = 'sub'.$i] == "1") {
            $subjectNames[$sub] =  $_SESSION['subjects'][$sub];
        }
    }
    return $subjectNames;
}
function setSubjects() { // for use in subject in file
    $subjects = array();
    for ($i = 1; $i <= 19; $i++) { 
        $subjects['sub'.$i] = isset($_POST['sub'.$i]) ? "1": "0";
    }
    $_SESSION['data']['mysubjects'] = $subjects;
    return $subjects;
}
function sumOfHours($data) {
    $sum = 0;
    foreach ($data as $hour) {
        $sum += $hour['hours'];
    }
    return $sum;
}
function idNotInArray($id, $array) {
    foreach($array as $el) {
        if($el == $id) {
            return FALSE;
        }
    }
    return TRUE;
}
function searchInUsers($data, $search) {
    $users = array();
    foreach($data as $user) {
        if(strpos($user['user_mail'],$search) !== FALSE || strpos($user['user_name'],$search) !== FALSE) { // checks if contains part of search
            $users[] = $user;
        }
    }
    return $users;
}