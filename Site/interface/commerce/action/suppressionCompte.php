<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_lister_commerce = getUrlIndex("listerCommerce");

$commerce = commerceConnecte();

if ($commerce !== null) {
	valeurValidePost("mdp");

	if ($mdp_valid) {
		supprimerCommerce($commerce->nom ,$mdp);
		deconnecterCommerce();
		valideAction($url_lister_commerce);
	}
	else {
		erreurAction("Mot de passe invalide", $url_lister_commerce);
	}
}
else {
	erreurAction("", $url_connexion);
}
?>
