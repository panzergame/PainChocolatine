<?php

include_once "../../../include/error.php";
include_once "../../../include/db/image.php";

valeurValidePost("categorie");
valeurValidePost("file");

if ($categorie_valid) {
	// Gestion de l'upload d'image.
	if (isset($_FILES["file"]) and !empty($_FILES["file"]["name"])) { // TODO fonction dans error.php
		$image = $_FILES["file"]["name"];
		$imageTmp = $_FILES["file"]["tmp_name"];
		$image_valid = enregisterImage($imageTmp, $image);
	}
	else {
		$image_valid = false;
	}

	if ($categorie == "client") {
		include_once "../../../interface/client/action/inscription.php";
	}
	else if ($categorie == "commerce") {
		include_once "../../../interface/commerce/action/inscription.php";	
	}
}

?>
