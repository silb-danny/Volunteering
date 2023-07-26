<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/redirect/check-admin.red.php";
  include_once "php/includes/class-autoload.inc.php";
?>
    <section class="block e0t626ot">
      <div class="block e00u7uq1">
        <p class="text e0gj62mj">אישור מורים חדשים</p>
        <form class="block e0urops5" method="post" action="php/includes/teacheradmit.inc.php">
          <button class="text e04xpda1" type="submit">עדכן</button>
          <?php
            $cont = new UsersView();
            $cont -> teacheradmit();
          ?>
        </form>
      </div>
    </section>
<?php
  include "component/footer.php";
?>