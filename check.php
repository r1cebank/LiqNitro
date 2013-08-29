<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("imageDownloader.php");
if (touchPreview("41049ac95994af37e077344a02afbdf9", "jpg"))
	echo "File Does Exist";
else
	echo "File Does not Exist";
?>