<?php
//Get the original image from post based on posts MD5
include("env/ev.php");
$md5 = $_POST["md5"];
$type = $_POST["type"];
$path = $api_path.$image_path;
$path = str_replace("#", $md5, $path);
$path = str_replace("@", $type, $path);
echo $path;
?>