<?php
require_once 'UptimeChecker.php';
$config = include 'config.php';
$uptime_checker = new UptimeChecker;
foreach ($config['urls'] as $url) {
    $url = $url ?? 'https://www.google.com';
    $output = "$url is : ";
    $status = 'down';
    if ($uptime_checker->startTest($url)) {
        $status = 'up';
    }
    echo $output . $status . '<br/>';
}
