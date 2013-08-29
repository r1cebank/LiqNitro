<?php
//Get Danbooru Post from search string
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
require_once 'env/ev.php';
include("firstResponder.php");
//include("setErrorHandler.php");
$limit = 10;
$page = 1;
$tags = "hatsune_miku rating:s";
if(isset($_POST["limit"]))
	$limit = $_POST["limit"];
if(isset($_POST["page"]))
	$page = $_POST["page"];
if(isset($_POST["tags"]))
	$tags = $_POST["tags"];
$login = $_POST["login"];
$api_key = $_POST["api_key"];
$request_string = $api_path.$post_path;
$request = new HTTP_Request2($request_string, HTTP_Request2::METHOD_GET);
$request->setAuth($login, $api_key, HTTP_Request2::AUTH_BASIC);
$url = $request->getUrl();
$param = array("limit" => $limit, "page" => $page, "tags" => $tags);
$url->setQueryVariables($param);
$start = microtime(true);
$response = $request->send();
$json = $response->getBody();
$status = $response->getStatus();
firstResponder($status);
$dump = json_decode($json);
//var_dump($dump);
$end = microtime(true);
$jsonArray = array();
foreach($dump as $out) {
	$md5 = $out->{'md5'};
	$type = $out->{'file_ext'};
	$path = $api_path.$image_path;
	$path = str_replace("#", $md5, $path);
	$path = str_replace("@", $type, $path);
	$jsonOut = array('url' => $path);
	array_push($jsonArray, $jsonOut);
	//echo json_encode($jsonOut);
}
echo json_encode($jsonArray);
?>