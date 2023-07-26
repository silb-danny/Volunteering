<?php

class Profile {

    public function showStudentProfile($name, $mail, $grade, $phone, $subjectNames) {
      echo '<section class="block e0u0govu">
        <div class="block e089sdfb">
          <div class="block e0vkref4">
            <p class="text e0yaeabm">' . $name . '</p>
            <p class="text e03ht9d1"> שלום</p>
          </div>
          <div class="block e0382s0c">
            <div class="block e0x6br3h">
              <div class="block e0x7zypx">
                <p class="text e0m5rxkk">דוא"ל</p>
                <p class="text e0vza5oi">' . $mail . '</p>
              </div>
              <div class="block e06nvflo">
                <p class="text e0rw2066">טלפון</p>
                <p class="text e08eojst">' . $phone . '</p>
              </div> <a class="text e018p4ze" href="php/includes/logout.inc.php">יציאה</a>';
        if($grade == 1) {
          echo '<p class="text e0u8roz2">תלמיד כיתה י</p>';
        } else if($grade == 2) {
          echo '<p class="text e0u8roz2">תלמיד כיתה יא</p>';
        } else if($grade == 3) {
          echo '<p class="text e0u8roz2">תלמיד כיתה יב</p>';
        }
        echo '<p class="text e0wbs8ve">מקצועות שאתם לומדים</p>
              <div class="block e0tis5vj">';
        foreach ($subjectNames as $subject) {
          echo '<p class="text e0f0a3v5">' . $subject . '</p>';
        }
          echo '</div>
            </div>
            <div class="block e07i0vp1"><a class="text e018p4ze" href="subject.php">החלף מקצועות</a><a class="text e0kbc5w2" href="teacherFind.php">הוספת מורים</a><a class="text e07wvxye" href="veiw.php">מורים</a></div>
          </div>
        </div>
      </section>';
    }

    public function showTeacherProfile($name, $mail, $grade, $phone, $subjectNames) {
      echo '<section class="block e0u0govu">
        <div class="block e089sdfb">
          <div class="block e0vkref4">
            <p class="text e0yaeabm">' . $name . '</p>
            <p class="text e03ht9d1"> שלום</p>
          </div>
          <div class="block e0382s0c">
            <div class="block e0x6br3h">
              <div class="block e0x7zypx">
                <p class="text e0m5rxkk">דוא"ל</p>
                <p class="text e0vza5oi">' . $mail . '</p>
              </div>
              <div class="block e06nvflo">
                <p class="text e0rw2066">טלפון</p>
                <p class="text e08eojst">' . $phone . '</p>
              </div> <a class="text e018p4ze" href="php/includes/logout.inc.php">יציאה</a>';
              if($grade == 1) {
                echo '<p class="text e0u8roz2">מורה כיתה י</p>';
              } else if($grade == 2) {
                echo '<p class="text e0u8roz2">מורה כיתה יא</p>';
              } else if($grade == 3) {
                echo '<p class="text e0u8roz2">מורה כיתה יב</p>';
              }
              echo '<p class="text e0wbs8ve">מקצועות שאתם מלמדים</p>
              <div class="block e0tis5vj">';
          foreach ($subjectNames as $subject) {
            echo '<p class="text e0f0a3v5">' . $subject . '</p>';
          }
          echo '</div>
            </div>
            <div class="block e07i0vp1"><a class="text e018p4ze" href="subject.php">החלף מקצועות</a><a class="text e0kbc5w2" href="volunteer.php">שעות התנדבות</a><a class="text e07wvxye" href="veiw.php">תלמידים</a></div>
          </div>
        </div>
      </section>';
    }

    public function showAdminProfile() {
      echo '<section class="block e0u7tu1s">
        <div class="block e0emj27m">
          <div class="block e0ncbb7b">
            <div class="block e0mo28rs">
              <p class="text e0hk2gtr">Admin</p>
              <p class="text e0vl5byx"> שלום</p>
            </div>
            <div class="block e07i0vp1"><a class="text e018p4ze" href="php/includes/logout.inc.php">יציאה</a> <a class="text e018p4ze" href="userSearch.php">עריכת משתמשים</a><a class="text e018p4ze" href="teacherAdmit.php">קבלת מורים</a></div>
          </div>
        </div>
      </section>';
    }
}
