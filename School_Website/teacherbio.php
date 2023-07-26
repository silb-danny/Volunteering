<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/redirect/check-teacher.red.php";
  include_once "php/includes/class-autoload.inc.php";
?>
    <section class="block e0dlc9uy">
      <div class="block e0jh6gq6">
        <div class="block e0cfdngh">
          <p class="text e0qdf4mk">הוסף מידע</p>
          <form class="block e0u72r74" method="post" action="php/includes/teacherbio.inc.php">
            <button class="text e0tounz7" type="submit">הבא</button>
            <?php
              $cont = new UsersView();
              $cont -> teacherbio();
            ?>
          </form>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>