<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_lister_commerce = getUrl("../../../index.php", array("action" => "listerCommerce"));

$client = clientConnecte();

if ($client !== null) {
	valeurValidePost("mdp");

	if ($mdp_valid) {
		supprimerClient($client->nom ,$mdp);
		deconnecterClient();
	}

	Header("Location: $url_lister_commerce");
}

?>
