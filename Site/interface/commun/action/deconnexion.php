<?php

include_once "../../../include/db/session.php";

deconnecterClient();
deconnecterCommerce();

$url = getUrlIndex("listerCommerce");
redirigerUrl($url);
?>
