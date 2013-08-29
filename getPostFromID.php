<?php
//Get Danbooru Post from Post ID
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
include("env/ev.php");
include("firstResponder.php");
//include("setErrorHandler.php");
$postID = $_POST["id"];
$login = $_POST["login"];
$api_key = $_POST["api_key"];
$request_string = $api_path.$post_abs_path;
$request_string = str_replace("#", $postID, $request_string);
$request = new HTTP_Request2($request_string, HTTP_Request2::METHOD_GET);
$request->setAuth($login, $api_key, HTTP_Request2::AUTH_BASIC);
$start = microtime(true);
$response = $request->send();
$json = $response->getBody();
$status = $response->getStatus();
firstResponder($status);
$dump = json_decode($json);
//var_dump($dump);
$end = microtime(true);
$jsonOut = array('created_at' => $dump->{'created_at'}, 'md5' => $dump->{'md5'}, 'file_ext' => $dump ->{'file_ext'}, 
				 'image_height' => $dump->{'image_height'}, 'image_width' => $dump->{'image_width'}, 
				 'file_size' => $dump->{'file_size'}, 'fav_count' => $dump->{'fav_count'}, 'artist' => $dump->{'tag_string_artist'},
				 'character' => $dump->{'tag_string_character'}, 'series' => $dump->{'tag_string_copyright'},
				 'id' => $dump->{'id'}, 'pixiv_id' => $dump->{'pixiv_id'}, 'rating' => $dump->{'rating'}, 'uploader' => $dump->{'uploader_name'}, 
				 'source' => $dump->{'source'}, 'tag_string' => $dump->{'tag_string'}, 'response_time' => round($end - $start, 3) * 1000, 
				 'preview' => str_replace("#", $dump->{'md5'}, $api_path.$preview_path));
$jsonArray = array(0 => $jsonOut);
echo json_encode($jsonArray);
?>