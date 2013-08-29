<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
include("saveStat.php");
include("APIMapping.php");
//include("setErrorHandler.php");
require_once 'env/ev.php';
if($api_mapping[$_POST["api_func"]] != "") {
	$request_string = $server_path.$api_mapping[$_POST["api_func"]];
	$request = new HTTP_Request2($request_string, HTTP_Request2::METHOD_POST);
	$request->addPostParameter($_POST);
	echo $request->send()->getBody();
} else
	die("UNSUPPORTED_API_CALL");
?>