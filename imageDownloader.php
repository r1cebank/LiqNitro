<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Return true if it is cached false if not and create Downloader Thread to download
function touchPreview ($md5, $ext) {
	require_once 'env/ev.php';
	require_once 'HTTP/Request2.php';
	$path = $api_path.$preview_path;
	$path = str_replace("#", $md5, $path);
	if(file_exists($preview_save_path.$md5.".".$ext)) {
		return true;
	} else {
		//echo $server_path.$preview_downloader_path;
		//echo $path;
		$request = new HTTP_Request2($server_path.$downloader_path, HTTP_Request2::METHOD_POST);
		$postArg = array ('url' => $path, 'md5' => $md5, 'ext' => 'jpg');
		$request->addPostParameter($postArg);
		$request->send();
		return false;
	}
}
?>