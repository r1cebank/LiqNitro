<?php
//Get the preview image from post based on posts MD5
include("env/ev.php");
$md5 = $_POST["md5"];
$path = $api_path.$preview_path;
$path = str_replace("#", $md5, $path);
echo $path;
?>