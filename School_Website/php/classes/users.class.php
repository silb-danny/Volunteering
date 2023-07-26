<?php

class Users extends Dbh {

    public function emailExists($email) {
        $sql  = "SELECT * FROM user_table WHERE user_mail = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
        $conn->close();
    }
    public function idExists($id) {
        $sql  = "SELECT * FROM teacher_bio WHERE teacher_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
        $conn->close();
    }
    public function getUser($id) {
        $sql  = "SELECT * FROM user_table WHERE user_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
        $conn->close();
    }
    public function getUserName($id) {
        $sql  = "SELECT user_name FROM user_table WHERE user_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
        $conn->close();
    }
    public function getAllUsers() {
        $sql = "SELECT user_id,user_name,user_mail FROM user_table WHERE NOT user_type = 'admin';";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $users = array();

        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $conn->close();
        return $users; // returns all users
    }
    public function getAlltobe() {
        $sql = "SELECT user_id,user_name,user_grade FROM user_table WHERE user_type = 'tobe_teacher';";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $users = array();

        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $conn->close();
        return $users; // returns all to be teachers
    }
    public function updateTeacher($id) {
        $sql  = "UPDATE user_table SET user_type='teacher' WHERE user_id=".$id.";";

        $conn = $this->connect();

        if ($conn->query($sql) === FALSE) {
            header("location: ../../profile.php?error=stmtfailed");
            exit();
        }
        $conn->close();
    }
    public function deleteUser($id) {
        $sql  = "DELETE FROM user_table WHERE user_id=".$id.";"; // deleting from user_table
        $sql1  = "DELETE FROM teacher_bio WHERE teacher_id=".$id.";"; // deleting from teacher bio
        $sql2  = "DELETE FROM teacher_student_connection WHERE teacher_id =".$id." OR student_id =".$id.";"; // deleting from connection of teacher student
        $sql3  = "DELETE FROM volunteer_history WHERE teacher_id=".$id.";"; // deleting from volunteering history
        $conn = $this->connect();
        
        if ($conn->connect_error) {
            header("location: ../../profile.php?error=stmtfailed");
            exit();
        }
        $stmt = $conn->prepare($sql); // deleting from user table
        $stmt->execute();
        $stmt = $conn->prepare($sql1); // deleting from teacher bio
        $stmt->execute();
        $stmt = $conn->prepare($sql2); // deleting from connection of teacher student
        $stmt->execute();
        $stmt = $conn->prepare($sql3); // deleting from volunteering history
        $stmt->execute();
        $conn->close();
    }
    public function addStudent($teacherid, $studentid) {
        $sql = "INSERT INTO teacher_student_connection (teacher_id,student_id) VALUES (".$teacherid.",".$studentid.");";
        $conn = $this->connect();
        
        if ($conn->connect_error) {
            header("location: ../../profile.php?error=stmtfailed");
            exit();
        }
        $stmt = $conn->prepare($sql); // adding teacher student connection
        $stmt->execute();
        $conn->close();
    }
    public function getStudents($id) {
        $sql  = "SELECT student_id FROM teacher_student_connection WHERE teacher_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $students = array();

        while($row = $result->fetch_assoc()) {
            $students[] = $row['student_id'];
        }
        $conn->close();
        return $students; // returns students id
    }
    public function getTeachers($id) {
        $sql  = "SELECT teacher_id FROM teacher_student_connection WHERE student_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $teachers = array();

        while($row = $result->fetch_assoc()) {
            $teachers[] = $row['teacher_id'];
        }
        $conn->close();
        return $teachers; // returns teachers id
    }
    public function deleteTeacher($teacherid, $studentid) {
        $sql = "DELETE FROM teacher_student_connection WHERE teacher_id =".$teacherid." AND student_id =".$studentid.";";
        $conn = $this->connect();
        
        if ($conn->connect_error) {
            header("location: ../../profile.php?error=stmtfailed");
            exit();
        }
        $stmt = $conn->prepare($sql); // deleting from user table
        $stmt->execute();
        $conn->close();
    }
    public function getTeacherBio($id) {
        $sql  = "SELECT * FROM teacher_bio WHERE teacher_id = ".$id.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
        $conn->close();
    }
    public function getAllTeachers($grade, $subjects) {
        $statm = array();
        foreach($subjects as $k => $v) {
            $statm[] = $k."= 1";
        }
        $sql = "SELECT * FROM user_table WHERE user_type = 'teacher' AND user_grade >= ".$grade." AND (".implode(' OR ', $statm).");";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $teachers = array();

        while($row = $result->fetch_assoc()) {
            $teachers[] = $row;
        }
        $conn->close();
        return $teachers; // returns teachers id
    }
    // volunteering
    public function addVolunteerSession($id, $studentName, $date, $hours) {
        $sql  = "INSERT INTO volunteer_history (teacher_id,date,hours,student_name) VALUES (".$id.",?,?,?);";
        
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        
        if ($conn->connect_error) {
            header("location: ../../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->bind_param("sis", $date, $hours, $studentName);
        $stmt->execute();
        $conn->close();
        
    }
    public function veiwVolunteerSessions($techerId) {
        $sql = "SELECT * FROM volunteer_history WHERE teacher_id=".$techerId.";";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if ($conn->connect_error) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $sessions = array();

        while($row = $result->fetch_assoc()) {
            $sessions[] = $row;
        }
        $conn->close();
        return $sessions; // returns students id
    }
    public function createUser($name, $email, $phone, $grade, $type, $pwd, $subjects) {
        // seperating subjects
        $keys = array(); 
        $values = array();
        foreach($subjects as $k => $v) {
            $keys[] = $k;
            $values[] = $v;
        }
        //.implode(', ', $keys).")
        $sql  = "INSERT INTO user_table (user_name, user_mail, user_phone, user_password, user_grade, user_type, ".implode(', ', $keys).") VALUES (?,?,?,?,?,?,".implode(', ', $subjects).");";
        
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        
        if ($conn->connect_error) {
            header("location: ../../signup.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssis", $name, $email, $phone, $hashedPwd, $grade, $type);
        $stmt->execute();
        $id = $stmt->insert_id;
        $conn->close();
        
        // creating data array
        // $data = array('user_name' => $name, 'user_mail' => $email, 'user_phone' => $phone, 'user_type' => $type, 'user_grade' => $grade, 'subjects' => $subjects);
        session_start();
        $_SESSION['data']['user_id'] = $id;
    }
    public function updateSubjects($subjects , $id) {
        // seperating subjects
        $values = array();
        foreach($subjects as $k => $v) {
            $values[] = $k ."=". "'".$v."'";
        }
        //.implode(', ', $keys).")
        $sql  = "UPDATE user_table SET ".implode(', ', $values)." WHERE user_id=".$id.";";

        $conn = $this->connect();

        if ($conn->query($sql) === FALSE) {
            header("location: ../../signup.php?error=stmtfailed");
            exit();
        }
        $conn->close();

        // creating data array
        // $data = array('user_name' => $name, 'user_mail' => $email, 'user_phone' => $phone, 'user_type' => $type, 'user_grade' => $grade, 'subjects' => $subjects);
    }
    public function createBio($subjectsNames, $subjectsAv, $id) {
        $key1 = array(); // sub19_av
        $value1 = array(); 
        $insert = array();
        $type = ""; // string
        foreach($subjectsNames as $k => $v) {
            $key1[] = $k;
            $value1[] = !empty($v) ? $v : "0";
            $insert[] = "?";
            $type .= "s";
        }
        $key2 = array(); // sub19_name
        $value2 = array(); 
        foreach($subjectsAv as $k => $v) {
            $key2[] = $k;
            $value2[] = !empty($v) ? $v : "0";
            $insert[] = "?";
            $type .= "s";
        }
        $sql = "INSERT INTO teacher_bio (teacher_id,".implode(', ', $key1).",". implode(', ', $key2).") VALUES (".$id.",".implode(', ', $insert).");";
        echo $sql;
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        
        if ($conn->connect_error) {
            header("location: ../../signup.php?error=stmtfailed");
            exit();
        }
        
        $stmt->bind_param($type, ...$value1, ...$value2);
        $stmt->execute();
        $conn->close();
    }
    public function updateBio($subjectsNames, $subjectsAv, $id) {
        $value1 = array(); 
        $insert = array();
        $type = ""; // string
        foreach($subjectsNames as $k => $v) {
            $value1[] = !empty($v) ? $v : "0";
            $insert[] = $k." = ?";
            $type .= "s";
        }
        $value2 = array(); 
        foreach($subjectsAv as $k => $v) {
            $value2[] = !empty($v) ? $v : "0";
            $insert[] = $k." = ?";
            $type .= "s";
        }
        $sql = "UPDATE teacher_bio SET ".implode(', ', $insert)." WHERE teacher_id=".$id.";";

        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        
        if ($conn->connect_error) {
            header("location: ../../signup.php?error=stmtfailed");
            exit();
        }
    
        $stmt->bind_param($type, ...$value1, ...$value2);
        $stmt->execute();
        $conn->close();
    }
}