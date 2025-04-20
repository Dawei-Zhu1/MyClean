<?php
/*Set session as not logged in if as a first time visitor*/
if (!isset($_SESSION['is_login'])) {
    $_SESSION['is_login'] = false;
}