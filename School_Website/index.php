<?php
  include "component/header.php";
  include_once "php/includes/prepareSubs.inc.php";
?>
    <section class="block e0hw3f3m">
      <div class="block e0pa42qh">
        <h1 class="text e0a9ixfz">התחבר</h1>
        <form class="block e03zzsir" action="php/includes/login.inc.php" method="post">
          <input class="e0arfvut" type="email" name="email" placeholder="הנכס דוא&quot;ל" required>
          <input class="e0llt6vo" type="password" name="pwd" required placeholder="הכנס סיסמא" >
          <button class="text e08va9qs" type="submit" name="loggedIn">כניסה</button>
          <?php // error messages
            if(isset($_GET['error']))
            {
                if($_GET['error'] == 'wrongemail')
                {
                    echo "<p>incorrect email</p>";
                }
                if($_GET['error'] == 'wrongpwd')
                {
                    echo "<p>incorrect password!</p>";
                }
                if($_GET['error'] == 'noerror')
                {
                    echo "<p>success!</p>";
                }
            }
          ?>
          <p class="text e0ka6g5k">Not a member? <a class="e02ix4km" href="signup.php">Sign Up</a></p>
        </form>
      </div>
    </section>
<?php
  include "component/footer.php";
?>