<?php

include_once "../../../include/error.php";

valeurValidePost("categorie");

echo $categorie;

if ($categorie_valid) {
	if ($categorie == "client") {
		include_once "../../../interface/client/action/inscription.php";
	}
	else if ($categorie == "commerce") {
		include_once "../../../interface/commerce/action/inscription.php";	
	}
}

?>
