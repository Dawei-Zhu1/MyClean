<?php
session_start();
require_once 'Database.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Dashboard";
require_once 'head.php'
?>
<body>
<?php require_once 'navbar.php' ?>
<div class="container">
    <!--If not logged in-->
    <?php if (isset($_GET['msg'])) { ?>



    <?php } else { ?>


    <?php } ?>
</div>
</body>
</html>
