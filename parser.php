<?php

require ('functions.php');

$file = $_GET['file'];
$url = isset($file) ? "uploads/$file" : "xml/data_light.xml";
$action = $_GET['action'];

if ($action == 'add') {
    add_new_items($url, $con);
} elseif ($action == 'delete') {
    delete_items($url, $con);
} elseif ($action == 'update') {
    update_items($url, $con);
}