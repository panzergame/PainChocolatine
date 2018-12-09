<?php 

include_once "include/url.php";

$url = getUrlIndex("listerCommerce");

header("Location: $url");

?>
