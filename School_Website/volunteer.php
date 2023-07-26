<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/redirect/check-teacher.red.php";
  include_once "php/includes/class-autoload.inc.php";
  include_once 'php/includes/functions.inc.php';
?>
    <section class="block e0mkm4jj">
      <div class="block e0lkngoc">
        <div class="block e0tgti8x">
          <a class="text e04bca07" type="button" href="profile.php">חזור</a>
          <p class="text e0j0ncr3">שעות התנדבות</p>
        </div>
        <div class="block e0ip0zxr">
          <form class="block e0c6n30z" action="php/includes/volunteer.inc.php" method="post">
            <button class="text e05wjei6" type="submit">הוסף שעות</button><select class="e0f8gu6d" name="student">
              <?php // adding session -student name-
                $cont = new UsersView();
                $cont -> volunteerAdd();
              ?>
            </select><input class="e0d7jko3" type="text" placeholder="הכנס שעות" name="hour"><input class="e02mtv3r" type="date" name="date">
          </form>
          <?php // error checker
            if(isset($_GET['error'])) {
              echo '<p style="text-align:center;color:red;"> הכנס נתונים תקינים</p>';
            }
          ?>
          <div class="block e0wpnlws">
            <?php
              $id = $_SESSION['data']['user_id'];
              $data = $cont -> veiwVolunteerSessions($id);
              $sum = sumOfHours($data);
              echo '<p class="text e0zt2cd0">'.$sum.'</p>';
            ?>
            <p class="text e0zz8emn">כמות השעות שעשיתם בסך הכל</p>
          </div>
          <table class="block e0cm3uni">
            <thead class="block e0m2u558">
              <tr class="block e0wvml0h">
                <th class="text e0ux9abo">מספר שעות</th>
                <th class="text e0v5a2g9">תאריך</th>
                <th class="text e0pu0pde">שם תלמיד</th>
              </tr>
            </thead>
            <tbody class="block e0frz219">
              <?php // past sessions
                $cont -> volunteerPastSessions($data);
              ?>
            </tbody>
            <caption class="text e0ekip5t">טבלת שעות התנדבות</caption>
          </table>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>