<?php
include_once "include/db/main.php";
include_once "include/url.php";
include_once "include/error.php";
?>

<!DOCTYPE html/>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Pain Chocolatine</title>
	</head>
	<body>

	<header>
		<ul>
		<?php
			$url_connexion = getUrlIndex("connexion");
			$url_deconnexion = getUrlIndex("deconnexion");
			$url_gestion_compte = getUrlIndex("gestionCompte");
			$url_inscription = getUrlIndex("inscription");
			$url_lister_commerce = getUrlIndex("listerCommerce");
			$url_lister_client = getUrlIndex("listerClient");
			$url_lister_reservation = getUrlIndex("listerReservation");
			$url_lister_ses_produit = getUrlIndex("listerSesProduit");
			$url_ajouter_produit = getUrlIndex("ajouterProduit");
			$url_ajouter_offre = getUrlIndex("ajouterOffre");

			$client = clientConnecte();
			$commerce = commerceConnecte();

			if ($client !== null or $commerce !== null) {
				$utilisateur = utilisateurConnecte();
				$imagePath = imagePath($utilisateur->image);
				echo "<li><img src=\"$imagePath\" alt=\"profile\" height=\"30\" width=\"30\"/></li>";

				if ($client !== null) {
					$nom = $client->nom;
					echo "<li>Connecté en tant que client ($nom)</li>";
				}
				else if ($commerce !== null) {
					$nom = $commerce->nom;
					echo "<li>Connecté en tant que commerçant ($nom)</li>";
				}

				echo "<li><a href=\"$url_gestion_compte\">Gestion</a></li>";
				echo "<li><a href=\"$url_deconnexion\">Se déconnecter</a></li>";

				if ($client !== null) {
					echo "<li><a href=\"$url_lister_commerce\">Les commerces</a></li>";
					echo "<li><a href=\"$url_lister_reservation\">Ses résérvations</a></li>";
				}
				else if ($commerce !== null) {
					echo "<li><a href=\"$url_lister_client\">Ses clients</a></li>";
					echo "<li><a href=\"$url_lister_ses_produit\">Ses produits</a></li>";
					echo "<li><a href=\"$url_ajouter_produit\">Ajouter un produit</a></li>";
					echo "<li><a href=\"$url_ajouter_offre\">Ajouter une offre</a></li>";
				}
			}
			else {
				echo "<li><a href=\"$url_connexion\">Se connecter</a></li>";
				echo "<li><a href=\"$url_inscription\">S'inscrire</a></li>";
			}
		?>

		</ul>
	</header>

	<section>
		<?php
			$erreur = erreurActuelle();
			if (!empty($erreur)) {
				echo "<p id=\"erreur\">Erreur : $erreur</p>";
			}
		?>
