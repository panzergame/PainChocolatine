<?php

$action = $_GET["action"];

if (isset($action)) {
	switch ($action) {
		case "listerCommerce":
			include_once "commun/listerCommerces.php";
			break;
	}
}

?>
