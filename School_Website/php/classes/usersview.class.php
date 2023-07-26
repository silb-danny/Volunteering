<?php

class UsersView extends Users {
    public function teacheradmit() {
        $cont = $this;
        $users = $cont -> getAlltobe();
        $count = 0;
        foreach($users as $user) {
            $grade = $user['user_grade'];
            $id = $user['user_id'];
            $name = $user['user_name'];
            echo '<div class="block e0u3054f">
            <div class="block e0ceqxmr"><input class="e0f7e30b" type="radio" value="t'.$id.'" name="'.$count.'"><input class="e0075uiv" type="radio" value="a'.$id.'" name="'.$count.'">
            <p class="text e0d9fzbu">בחר</p>
            </div>';
            if($grade == 1) {
            echo '<p class="text e0u8roz2">כיתה י</p>';
            } else if($grade == 2) {
            echo '<p class="text e0u8roz2">כיתה יא</p>';
            } else if($grade == 3) {
            echo '<p class="text e0u8roz2">כיתה יב</p>';
            }
            echo '<p class="text e0p6rsep">'.$name.' :שם</p>
        </div>';
        $count ++;
        }
    }
    public function teacherbio() {
        $subjects = $_SESSION['data']['subjects'];
        if(sizeof($subjects) == 0) {
            header("location: profile.php");
            exit();
        }
        foreach($subjects as $sub => $name) {
            echo '<div class="block e0pcm63q"><input class="e07x1srx" type="text" placeholder="הכנס ממוצע" name="'.$sub.'av" minlength="1" maxlength="3" required><input class="e00r54lq" type="text" placeholder="הכנס שם מורה מקצועי" name="'.$sub.'name" required>
            <p class="text e0crbgns">'.$name.'</p>
        </div>';
        }
    }
    public function teacherfind() {
        $cont = $this;
        $id = $_SESSION['data']['user_id'];
        $teachersid = $cont -> getTeachers($id);
        if(sizeof($teachersid) < 10) { // less than 10 teachers
            $subjects = $_SESSION['data']['subjects'];
            $grade = $_SESSION['data']['user_grade'];
            $teachers = $cont -> getAllTeachers($grade, $subjects);
            foreach($teachers as $teacher) {
            $idt = $teacher['user_id']; // teacher id
            $name = $teacher['user_name'];
            $tgrade = $teacher['user_grade'];
            $teachStudents = $cont -> getStudents($idt);
            if(idNotInArray($idt, $teachersid) === TRUE && sizeof($teachStudents) < 10) { // checks if teacher already with student and if  --- teacher has any seats left ---
                $tBio = $cont -> getTeacherBio($idt);
                echo '<form class="block e0ignegn" action="php/includes/teacherFind.inc.php" method="post">
                <button class="text e0lg087m" type="submit" name="picked" value="'.$idt.'">שלח הודעה למורה</button>';
                if($tgrade == 1) {
                echo '<p class="text e0m9hg4u">כיתה: י</p>';
                } else if($tgrade == 2) {
                echo '<p class="text e0m9hg4u">כיתה: יא</p>';
                } else if($tgrade == 3) {
                echo '<p class="text e0m9hg4u">כיתה: יב</p>';
                }
                echo '<p class="text e0s4o2ns">'.$name.' :שם</p>
                <details class="block e0hs02dc">
                <p class="text e0elrg5u">';
                $subjects = subjectNameslog($teacher); // getting teacher subjects with names
                foreach($subjects as $key => $name) {
                echo ''.$name.' | לומד אצל :'.$tBio[$key.'_name'].' | ממוצע : '.$tBio[$key.'_av'].'<br>';
                }
                echo '</p>
                    <summary class="text e0bwg1ir">למידע נוסף</summary>
                </details>
                </form>';
            }
            }
        } else {
            echo '<p class="text e0m9hg4u">יש לכם כבר 10 מורים</p>';
        }
    }
    public function trash() {
        if(isset($_SESSION['trash_connection'])) {
          $id = $_SESSION['trash_connection'];
          $cont = $this;
          $otherUser = $cont -> getUser($id);
          $tgrade = $otherUser['user_grade'];
          $name = $otherUser['user_name'];
          echo '<div class="block e0n4eamv">
          <p class="text e08r1kps">'.$name.' :שם</p>';
          if($tgrade == 1) {
            echo '<p class="text e07zsh1l">כיתה: י</p>';
          } else if($tgrade == 2) {
            echo '<p class="text e07zsh1l">כיתה: יא</p>';
          } else if($tgrade == 3) {
            echo '<p class="text e07zsh1l">כיתה: יב</p>';
          }
          echo '</div>
          <form class="block e0dc4kmg" action="php/includes/trash.inc.php" method="post"><input class="e0nu5oee" type="text" placeholder="נושא המשוב" value="משוב לתלמיד\מורה לגבי הפסקת הלמידה" name="subject"><textarea class="e0ub0qlw" placeholder="...הכנס משוב" name="main"></textarea>
          <button class="block e0omq5np" type="submit" name="delCon" value="'.$id.'"><img class="e0be7idj" srcset="asset/image/trash.png 1x"></button></form>';
        } else {
          header("location: profile.php");
        }
    }
    public function usersearch() {
        $cont = $this;
        if(isset($_GET['search'])) {
          $search = $_GET['search'];
          $users = $cont ->getAllUsers();
          if($search != "") {
            $users = searchInUsers($users, $search);
          }
        }
        else {
          $users = $cont ->getAllUsers();
        }
        foreach($users as $user) {
          $mail = $user['user_mail'];
          $id = $user['user_id'];
          $name = $user['user_name'];
          echo '<form class="block e0btacsm" action="php/includes/userSearch.inc.php" method="post">
          <div class="block e0bz7crs">
            <button class="text e0tzu926" type="submit" name="delet" value="'.$id.'"></button>
          </div>
          <p class="text e01dlpi6">'.$mail.'</p>
          <p class="text e0xs9ga3">'.$name.' :שם</p>
        </form>';
        }
    }
    public function veiw() {
        $cont = $this;
        $id = $_SESSION['data']['user_id'];
        if($type = "student") {
            $ids = $cont -> getTeachers($id);
        } else {
            $ids = $cont -> getStudents($id);
        }
        foreach($ids as $id) {
            $otherUser = $cont -> getUser($id);
            $tgrade = $otherUser['user_grade'];
            $oname = $otherUser['user_name'];
            echo '<div class="block e0407ry0">
            <form class="block e0e59m2k" action="php/includes/veiw.inc.php" method="post">
            <button class="text e0d08p7m" type="submit" name="action" value="t'.$otherUser['user_id'].'"></button>
            <button class="text e0t4sxzd" type="submit" name="action" value="s'.$otherUser['user_id'].'">שלח פרטים</button>
            </form>';
            if($tgrade == 1) {
            echo '<p class="text e0xf79fr">כיתה: י</p>';
            } else if($tgrade == 2) {
            echo '<p class="text e0xf79fr">כיתה: יא</p>';
            } else if($tgrade == 3) {
            echo '<p class="text e0xf79fr">כיתה: יב</p>';
            }
            echo'<p class="text e0dmy223">'.$oname.' :שם</p>
        </div>';
        }
    }
    public function volunteerAdd() {
        $cont = $this;
        $id = $_SESSION['data']['user_id'];
        $studentIDs = $cont -> getStudents($id);
        foreach($studentIDs as $id) {
            $name = $cont -> getUserName($id);
            $name = $name['user_name'];
            echo '<option value="'.$name.'" selected>'.$name.'</option>';
        }
    }
    public function volunteerPastSessions($data) {
        foreach($data as $sesh) {
            echo '<tr class="block e0js5adk">
            <td class="text e0kx0lqi">'.$sesh['hours'].'</td>
            <td class="text e0hm5fg1">'.$sesh['date'].'</td>
            <td class="text e072fflu">'.$sesh['student_name'].'</td>
          </tr>';
        }
    }
}