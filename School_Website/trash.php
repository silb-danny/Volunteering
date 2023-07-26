<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
  include_once "php/includes/class-autoload.inc.php";
?>
    <section class="block e0949s0t">
      <div class="block e0lb98ht">
        <?php
          $type = $_SESSION['data']['user_type'];
          if($type == "student") {
            echo '<p class="text e0aas9om">הסרת מורה</p>';
          } else {
            echo '<p class="text e0aas9om">הסתר תלמיד</p>';
          }
        ?>
        <div class="block e0v8bmxk">
          <div class="block e0ymjgyd">
            <?php 
              $cont = new UsersView();
              $cont -> trash();
            ?>
        </div>
      </div>
    </section>
<?php
  include "component/footer.php";
?>