<?php
require_once ('UptimeChecker.php');

$uptime_checker = new UptimeChecker;
$result = $uptime_checker->startTest($_GET['url']);
if ($result) {
    echo 'Up';
}else {
    echo 'Down';
}
