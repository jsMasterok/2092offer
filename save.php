<?php
date_default_timezone_set('Europe/Lisbon');

$name = $_POST['name'] ?? '';
$tel = $_POST['tel'] ?? '';

$datetime = date("Y.m.d H:i:s");
$country = "PT";
$sub_id = $_GET['sub_id'] ?? '';
$source = $_GET['source'] ?? 'fb';
$ip = $_SERVER['REMOTE_ADDR'];
$offer_id = '2029';
$click_id = $_GET['click_id'] ?? '';

$csv_line = [
    $datetime,
    $name,
    $tel,
    $country,
    $sub_id,
    $source,
    $ip,
    $click_id,
    '',
    $offer_id,
];

$file = fopen("leads.csv", "a");
fputcsv($file, $csv_line);
fclose($file);

// редирект или подтверждение
header("Location: index.html");
exit();
?>s