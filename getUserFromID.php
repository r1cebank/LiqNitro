<?php
//Get User Information based on ID
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
require_once 'env/ev.php';
include("firstResponder.php");
//include("setErrorHandler.php");
$userID = $_POST["id"];
$login = $_POST["login"];
$api_key = $_POST["api_key"];
$request_string = $api_path.$users_abs_path;
$request_string = str_replace("#", $userID, $request_string);
$request = new HTTP_Request2($request_string, HTTP_Request2::METHOD_GET);
$request->setAuth($login, $api_key, HTTP_Request2::AUTH_BASIC);
$start = microtime(true);
$response = $request->send();
$json = $response->getBody();
$status = $response->getStatus();
$end = microtime(true);
firstResponder($status);
$dump = json_decode($json);
//var_dump($dump);
$jsonOut = array('name' => $dump->{'name'}, 'level' => $dump->{'level'}, 'favorite_count' => $dump->{'favorite_count'},
				 'id' => $dump->{'id'}, 'response_time' => round($end - $start, 3) * 1000);
$jsonArray = array(0 => $jsonOut);
echo json_encode($jsonArray);
?>