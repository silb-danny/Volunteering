<?php
  include "component/header.php";
  include_once "php/includes/prepareSubs.inc.php";
?>
    <section class="block e0jujv2u">
      <div class="block e0yqfzmr">
        <h1 class="text e0m3jxrf">הירשם</h1>
        <form class="block e0dl4hye"  action="php/includes/signup.inc.php" method="post">
          <input class="e0p35sbz" type="email" name="email" placeholder="הנכס דוא&quot;ל" required>
          <input class="e0g2ql9o" type="text" name="name"placeholder="הכנס שם" required >
          <input class="e0ketevk" type="password" name="pwd" required placeholder="הכנס סיסמא" >
          <div class="block e0kpfc6s"><select class="e0ywmgty" required name="grade">
              <option value="1">י</option>
              <option value="2">יא</option>
              <option value="3">יב</option>
            </select><select class="e0w9e2x4" name="type" required>
              <option value="student" selected>תלמיד</option>
              <option value="tobe_teacher">מורה</option>
            </select>
            <input class="e0082lu0" type="text" name="phone" placeholder="הכנס נייד">
          </div>
          <button class="text e0xbv846" type="submit" name="loggedIn">כניסה</button>
          <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == 'emailinvalid')
                {
                    echo "<p>email invalid</p>";
                }
                if($_GET['error'] == 'emailtaken')
                {
                    echo "<p>email already taken!</p>";
                }
                if($_GET['error'] == 'noerror')
                {
                    echo "<p>success!</p>";
                }
            }
          ?>
          <p class="text e0wkjk1q">Already a member? <a class="e094dqv4" href="index.php">Log In</a></p>
        </form>
      </div>
    </section>
<?php
  include "component/footer.php";
?>