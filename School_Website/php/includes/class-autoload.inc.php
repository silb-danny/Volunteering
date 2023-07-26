<?php

function load_model($class_name)
{
	$path_to_file = 'php/classes/' . $class_name . '.class.php';
    $path_to_file1 = '../classes/' . $class_name . '.class.php';
	if (file_exists($path_to_file)) {
		require $path_to_file;
	} else
    if(file_exists($path_to_file1))
    {
        require $path_to_file1;
    }
}

spl_autoload_register('load_model');

// include_once "php/classes/dbh.class.php";
// include_once "php/classes/mail.class.php";
// include_once "php/classes/profile.class.php";
// include_once "php/classes/users.class.php";
// include_once "php/classes/userscontr.class.php";
// include_once "php/classes/usersview.class.php";