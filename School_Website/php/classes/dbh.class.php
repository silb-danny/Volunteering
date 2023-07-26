<?php

class Dbh {
    private $host = "localhost"; // name of host
    private $user = "root";
    private $pwd = "hANo,z8V4Xi/(H%5";
    private $dbName = "volunteer_work"; // name of database

    protected function connect() {
        $sqli = new mysqli($this->host, $this->user, $this->pwd, $this->dbName);
        return $sqli;
    }
    private function createDbt() {
        $conn = new mysqli($this->host, $this->user, $this->pwd);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "CREATE DATABASE volunteer_work;"; // creating database
        if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $conn->error;
        }
        $conn->close();

        $conn = $this->connect();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // sql to create table
        $sql = "CREATE TABLE user_table ( 
            user_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
            user_name varchar(128) NOT NULL,
            user_mail varchar(128) NOT NULL,
            user_phone varchar(128) NOT NULL DEFAULT ‘000’,
            user_password varchar(255) NOT NULL,
            user_grade int(6) NOT NULL DEFAULT ‘1’,
            user_type varchar(128) NOT NULL,
            sub1 int(4) NOT NULL DEFAULT 0,
            sub2 int(4) NOT NULL DEFAULT 0,
            sub3 int(4) NOT NULL DEFAULT 0,
            sub4 int(4) NOT NULL DEFAULT 0,
            sub5 int(4) NOT NULL DEFAULT 0,
            sub6 int(4) NOT NULL DEFAULT 0,
            sub7 int(4) NOT NULL DEFAULT 0,
            sub8 int(4) NOT NULL DEFAULT 0,
            sub9 int(4) NOT NULL DEFAULT 0,
            sub10 int(4) NOT NULL DEFAULT 0,
            sub11 int(4) NOT NULL DEFAULT 0,
            sub12 int(4) NOT NULL DEFAULT 0,
            sub13 int(4) NOT NULL DEFAULT 0,
            sub14 int(4) NOT NULL DEFAULT 0,
            sub15 int(4) NOT NULL DEFAULT 0,
            sub16 int(4) NOT NULL DEFAULT 0,
            sub17 int(4) NOT NULL DEFAULT 0,
            sub18 int(4) NOT NULL DEFAULT 0,
            sub19 int(4) NOT NULL DEFAULT 0);
            ";
        if ($conn->query($sql) === TRUE) {
            echo "Table user_table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        $sql = "CREATE TABLE teacher_student_connection (
            teacher_id int NOT NULL,
            student_id int NOT NULL );
            ";
        if ($conn->query($sql) === TRUE) {
        echo "Table teacher_student_connection created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        $sql = "CREATE TABLE volunteer_history (
            teacher_id int NOT NULL,
            date varchar(128) NOT NULL, 
            hours int NOT NULL,
            student_name varchar(128) NOT NULL );
            ";
        if ($conn->query($sql) === TRUE) {
            echo "Table volunteer_history created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        $sql = "CREATE TABLE teacher_bio (
            teacher_id int NOT NULL UNIQUE,
            sub1_av varchar(6) NOT NULL,
            sub2_av varchar(6) NOT NULL,
            sub3_av varchar(6) NOT NULL,
            sub4_av varchar(6) NOT NULL,
            sub5_av varchar(6) NOT NULL,
            sub6_av varchar(6) NOT NULL,
            sub7_av varchar(6) NOT NULL,
            sub8_av varchar(6) NOT NULL,
            sub9_av varchar(6) NOT NULL,
            sub10_av varchar(6) NOT NULL,
            sub11_av varchar(6) NOT NULL,
            sub12_av varchar(6) NOT NULL,
            sub13_av varchar(6) NOT NULL,
            sub14_av varchar(6) NOT NULL,
            sub15_av varchar(6) NOT NULL,
            Sub16_av varchar(6) NOT NULL,
            sub17_av varchar(6) NOT NULL,
            sub18_av varchar(6) NOT NULL,
            Sub19_av varchar(6) NOT NULL,
            sub1_name varchar(128) NOT NULL,
            sub2_name varchar(128) NOT NULL,
            sub3_name varchar(128) NOT NULL,
            sub4_name varchar(128) NOT NULL,
            sub5_name varchar(128) NOT NULL,
            sub6_name varchar(128) NOT NULL,
            sub7_name varchar(128) NOT NULL,
            sub8_name varchar(128) NOT NULL,
            sub9_name varchar(128) NOT NULL,
            sub10_name varchar(128) NOT NULL,
            sub11_name varchar(128) NOT NULL,
            sub12_name varchar(128) NOT NULL,
            sub13_name varchar(128) NOT NULL,
            sub14_name varchar(128) NOT NULL,
            sub15_name varchar(128) NOT NULL,
            sub16_name varchar(128) NOT NULL,
            sub17_name varchar(128) NOT NULL,
            sub18_name varchar(128) NOT NULL,
            sub19_name varchar(128) NOT NULL );
            ";
        if ($conn->query($sql) === TRUE) {
            echo "Table teacher_bio created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        //adding admin
        $sql = "INSERT INTO user_table (user_name, user_mail, user_password, user_type) VALUES ('admin', 'reali.teacherVol.admi@gmail.com', '$2y$10$tokCzBH/q2SH9iXW8m5WRO2LWewgAF9aKN/00wp/r4gFNQNIojFqq', 'admin');";
        if ($conn->query($sql) === TRUE) {
            echo "admin added successfully";
        } else {
            echo "Error adding admin: " . $conn->error;
        }

        $conn->close();
    }
    public function createDatabase()
    {
        $this -> createDbt();
    }

    
}