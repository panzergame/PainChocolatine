<?php
include_once "include/db/main.php";
include_once "include/url.php";
include_once "include/error.php";
?>

<!DOCTYPE html/>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pain Chocolatine</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>

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
		$url_statistique_commerce = getUrlIndex("listerStatistiqueCommerce");
		$url_statistique_client = getUrlIndex("listerStatistiqueClient");

		$client = clientConnecte();
		$commerce = commerceConnecte();
	?>

	<header>
		<h1><a href=".">Pain Chocolatine</a></h1>
		<?php
			if ($client !== null or $commerce !== null) {
				$utilisateur = utilisateurConnecte();
				$imagePath = imagePath($utilisateur->image);
				echo "<img src=\"$imagePath\" alt=\"profile\"/>";

				echo "<p>";
				if ($client !== null) {
					$nom = $client->nom;
					echo "Connecté en tant que client ($nom)";
				}
				else if ($commerce !== null) {
					$nom = $commerce->nom;
					echo "Connecté en tant que commerçant ($nom)";
				}
				echo "</p>";

			}
		?>
	</header>
	<nav>
		<ul>
		<?php
			if ($client !== null or $commerce !== null) {
				echo "<li><a href=\"$url_gestion_compte\">Gestion</a></li>";
				echo "<li><a href=\"$url_deconnexion\">Se déconnecter</a></li>";

				if ($client !== null) {
					echo "<li><a href=\"$url_lister_commerce\">Les commerces</a></li>";
					echo "<li><a href=\"$url_lister_reservation\">Ses réservations</a></li>";
					echo "<li><a href=\"$url_statistique_client\">Ses réservations efféctuées</a></li>";
				}
				else if ($commerce !== null) {
					echo "<li><a href=\"$url_lister_client\">Ses clients</a></li>";
					echo "<li><a href=\"$url_lister_ses_produit\">Ses produits</a></li>";
					echo "<li><a href=\"$url_ajouter_produit\">Ajouter un produit</a></li>";
					echo "<li><a href=\"$url_ajouter_offre\">Ajouter une offre</a></li>";
					echo "<li><a href=\"$url_statistique_commerce\">Ses réservations efféctuées</a></li>";
				}

			}
			else {
				echo "<li><a href=\"$url_connexion\">Se connecter</a></li>";
				echo "<li><a href=\"$url_inscription\">S'inscrire</a></li>";
			}
		?>
		</ul>
	</nav>

	<section>
		<?php
			$erreur = erreurActuelle();
			if (!empty($erreur)) {
				echo "<p id=\"erreur\">Erreur : $erreur</p>";
			}
		?>
