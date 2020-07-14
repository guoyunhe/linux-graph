<?php

$data = [];

require_once(__DIR__ . '/telegram-data.php');

$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($data));
fclose($fp);
