<?php
session_start();
require_once __DIR__.'/../includes/Database.php';
require_once __DIR__.'/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Dashboard";
require_once __DIR__.'/../includes/head.php'
?>
<body>
<?php require_once __DIR__.'/../includes/navbar.php' ?>
<div class="container">
    <!--If not logged in-->
    <?php if (isset($_GET['msg'])) { ?>



    <?php } else { ?>


    <?php } ?>
</div>
</body>
</html>
