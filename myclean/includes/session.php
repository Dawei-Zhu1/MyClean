<?php
/*Set session as not logged in if as a first time visitor*/
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}