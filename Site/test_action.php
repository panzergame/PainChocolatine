<?php 

include_once "include/url.php";

$url = getUrl("index.php", array("action" => "listerCommerce"));

header("Location: $url");

?>
