<?php
require_once ('UptimeChecker.php');

$uptime_checker = new UptimeChecker;
$url = $_GET['url'] ?? 'https://www.google.com';
$output = "$url is : ";
$status = 'down';

if ($uptime_checker->startTest($url)) {
    $status = 'up';
}
echo $status;
