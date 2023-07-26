<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/includes/class-autoload.inc.php";
?>
    <section class="block e0x7tw24">
      <div class="block e0p08wxf">
        <div class="block e02d25jj">
          <a class="text e07iiw0c" href="profile.php">חזור</a>
          <?php
            $type = $_SESSION['data']['user_type'];
            if($type == "student") {
              echo '<p class="text e06jksxr">המורים שלך</p>';
            } else {
              echo '<p class="text e06jksxr">התלמידים שלך</p>';
            }
          ?>
        </div>
        <div class="block e0htdkpu">
          <?php
            $cont = new UsersView();
            $cont -> veiw();
          ?>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>