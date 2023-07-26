<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/redirect/check-admin.red.php";
  include_once "php/includes/class-autoload.inc.php";
  include_once 'php/includes/functions.inc.php';
?>
    <section class="block e0yyh1yk">
      <div class="block e0jdajo5">
        <div class="block e0i6q7qz"><a class="text e0kt37c6" type="button" href="profile.php">חזור</a>
          <p class="text e0jmqvcn">חיפוש משתמשים</p>
        </div>
        <div class="block e0z29cx8">
          <form class="block e0n43vu9" action="php/includes/userSearch.inc.php" method="post"><a class="block e0wbz97s" type="submit" href="#"><img class="e0ogq6c6" srcset="asset/image/search.png 1x" onclick="#"></a><input class="e0h9wm29" type="text" placeholder="חפש שם או דוא&quot;ל של משתמש" name="search"></form>
          <?php
            $cont = new UsersView();
            $cont -> usersearch();
          ?>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>