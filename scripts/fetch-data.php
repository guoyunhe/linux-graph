<?php

$data = [];

require_once(__DIR__ . '/providers/matrix.php');
require_once(__DIR__ . '/providers/reddit.php');
require_once(__DIR__ . '/providers/telegram.php');

$fp = fopen(__DIR__ . '/../public/data.json', 'w');
fwrite($fp, json_encode($data));
fclose($fp);
