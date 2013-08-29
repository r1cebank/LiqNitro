<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("env/ev.php");
$url = $_POST['url'];
$md5 = $_POST['md5'];
$ext = $_POST['ext'];
file_put_contents($preview_save_path.$md5.".".$ext, file_get_contents($url));
?>