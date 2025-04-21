<?php
session_start();
include_once __DIR__ . '/../includes/check_accessibility.php';
// Eligible
echo "test1: 'user' in ['user', 'admin']" . PHP_EOL;
$result = check_accessibility('user', ['user', 'admin']);
echo ($result ? 'True' : 'False') . PHP_EOL;
// Not eligible
echo "test2: 'visitor' in ['user', 'admin']" . PHP_EOL;
$result = check_accessibility('visitor', ['user', 'admin']);
echo ($result ? 'True' : 'False') . PHP_EOL;
