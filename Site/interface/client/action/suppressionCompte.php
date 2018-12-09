<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_lister_commerce = getUrlIndex("listerCommerce");

$client = clientConnecte();

if ($client !== null) {
	valeurValidePost("mdp");

	if ($mdp_valid) {
		supprimerClient($client->nom ,$mdp);
		deconnecterClient();
		valideAction($url_lister_commerce);
	}

	erreurAction("Mot de passe invalide", $url_lister_commerce);
}

?>
