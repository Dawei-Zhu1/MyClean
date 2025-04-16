<?php
session_start();
session_destroy(); // Delete all session data

header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
