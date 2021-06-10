<?php
/*
 * Description: This page purpose is to handle various user requests
 * Author: Sharief
 */
require 'autoload.php';

$obj = new includes/maps();

/**
 * This simple condition can expanded based on new requirement
 */
if (($_POST['searchType'] ?? 'none') == 'searchaddress')
    echo $obj->searchAddress();
else
    echo json_encode(array());

?>