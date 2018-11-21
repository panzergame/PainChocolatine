<?php

if (isset($_POST["client"])) {
	include_once "../../../interface/client/action/connexion.php";
}
else if (isset($_POST["commerce"])) {
	include_once "../../../interface/commerce/action/connexion.php";	
}

?>
