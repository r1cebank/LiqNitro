<?php
require_once 'env/ev.php';
$stat = (int)file_get_contents($stat_path);
$stat++;
file_put_contents($stat_path, $stat);
?>