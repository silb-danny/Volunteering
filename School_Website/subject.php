<?php
  include "component/header.php";
  include_once "php/redirect/logged-in.red.php";
?>
    <section class="block e0yrk6vt">
      <div class="block e0swb0sj">
        <p class="text e036dfp3">בחר אילו מקצועות תרצה ללמוד או ללמד</p>
        <form class="block e0r3gooe" action="php/includes/subject.inc.php" method="post">
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c1">מתמטיקה 3 יחל</label><input class="e0m58xa0" type="checkbox" id="c1" name="sub1" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c2">מתמטיקה 4 יחל</label><input class="e0m58xa0" type="checkbox" id="c2" name="sub2" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c3">מתמטיקה 5 יחל</label><input class="e0m58xa0" type="checkbox" id="c3" name="sub3" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c4">אנגלית</label><input class="e0m58xa0" type="checkbox" id="c4" name="sub4" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c5">ערבית</label><input class="e0m58xa0" type="checkbox" id="c5" name="sub5" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c6">פיזיקה</label><input class="e0m58xa0" type="checkbox" id="c6" name="sub6" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c7">ביולוגיה</label><input class="e0m58xa0" type="checkbox" id="c7" name="sub7" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c8">כימיה</label><input class="e0m58xa0" type="checkbox" id="c8" name="sub8" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c9">מנהל עסקים</label><input class="e0m58xa0" type="checkbox" id="c9" name="sub9" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c10">ערבית מדוברת</label><input class="e0m58xa0" type="checkbox" id="c10" name="sub10" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c11">לשון</label><input class="e0m58xa0" type="checkbox" id="c11" name="sub11" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c12">היסטוריה</label><input class="e0m58xa0" type="checkbox" id="c12" name="sub12" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c13">תנ"ך</label><input class="e0m58xa0" type="checkbox" id="c13" name="sub13" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c14">ספרות</label><input class="e0m58xa0" type="checkbox" id="c14" name="sub14" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c15">מדעי המחשב</label><input class="e0m58xa0" type="checkbox" id="c15" name="sub15" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c16">מערכות בריאות</label><input class="e0m58xa0" type="checkbox" id="c16" name="sub16" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c17">פסיכו-סוציו</label><input class="e0m58xa0" type="checkbox" id="c17" name="sub17" value="1"></div>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c18">גיאוגרפיה</label><input class="e0m58xa0" type="checkbox" id="c18" name="sub18" value="1"></div>
          <button class="text e022cew2" type="submit" >הבא</button>
          <div class="block e0koqr5n"><label class="text e0zsp7b0" for="c19">אזרחות</label><input class="e0m58xa0" type="checkbox" id="c19" name="sub19" value="1"></div>
        </form>
      </div>
    </section>
<?php
  include "component/footer.php";
?>