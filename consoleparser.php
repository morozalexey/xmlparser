<?php

require('functions.php');

$route = substr($argv[1], 5);
$url = (!empty($route)) ? $route : "xml/data_light.xml";
add_new_items($url, $con);