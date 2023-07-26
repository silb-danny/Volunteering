<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/redirect/check-student.red.php";
  include_once "php/includes/class-autoload.inc.php";
  include_once "php/includes/functions.inc.php";
?>
    <section class="block e0n408e8">
      <div class="block e008xlj9">
        <div class="block e02d25jj"><a class="text e0d0omqe" href="profile.php">הבא</a><p class="text e0ob9czl">בחר מורה</p></div>
        <div class="block e0xdud5l">
          <?php 
            $cont = new UsersView();
            $cont -> teacherfind();
          ?>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>