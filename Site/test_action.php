<?php 

include_once "include/get.php";

$url = getUrl("index.php", array("action" => "listerCommerce"));

header("Location: $url");

?>
