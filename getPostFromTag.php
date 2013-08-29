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
	$jsonOut = array('created_at' => $out->{'created_at'}, 'md5' => $out->{'md5'}, 'file_ext' => $out ->{'file_ext'}, 
				 'image_height' => $out->{'image_height'}, 'image_width' => $out->{'image_width'}, 
				 'file_size' => $out->{'file_size'}, 'fav_count' => $out->{'fav_count'}, 'artist' => $out->{'tag_string_artist'},
				 'character' => $out->{'tag_string_character'}, 'series' => $out->{'tag_string_copyright'},
				 'id' => $out->{'id'}, 'pixiv_id' => $out->{'pixiv_id'}, 'rating' => $out->{'rating'}, 'uploader' => $out->{'uploader_name'}, 
				 'source' => $out->{'source'}, 'tag_string' => $out->{'tag_string'}, 'response_time' => round($end - $start, 3) * 1000, 
				 'preview' => str_replace("#", $out->{'md5'}, $api_path.$preview_path));
	array_push($jsonArray, $jsonOut);
	//echo json_encode($jsonOut);
}
echo json_encode($jsonArray);
?>