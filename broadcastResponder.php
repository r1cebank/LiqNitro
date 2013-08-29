<?php
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
include("env/cv.php");
$json = array("api_type" => $api_capability, "delay" => "200");
echo json_encode($json);
?>