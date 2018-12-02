<?php

include_once "../../../include/error.php";
include_once "../../../include/db/image.php";

valeurValidePost("categorie");
valeurValidePost("file");

if ($categorie_valid) {
	// Gestion de l'upload d'image.
	valeurValideFiles("image");

	if ($image_valid) {
		$image_valid = enregisterImage($imageTmp, $image);
	}

	if ($categorie == "client") {
		include_once "../../../interface/client/action/inscription.php";
	}
	else if ($categorie == "commerce") {
		include_once "../../../interface/commerce/action/inscription.php";	
	}
}

?>
