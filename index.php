<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'HTTP/Request2.php';
echo "<html><head><title>Danbooru Compressor</title></head>";
echo "<body>";
echo "<h2>Danbooru Compressor for liqNitro</h2><br>Server Status: OK<br>";
echo "Testing PEAR...<br>";
$request = new HTTP_Request2('http://localhost/pear.php');
echo $request->send()->getBody();
echo "<br><i><u>Version 1.0</u></i><br><u>R1cebank Productions</u></body></html>"
?>