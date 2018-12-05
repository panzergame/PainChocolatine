<?php
include_once "include/db/main.php";
include_once "include/get.php";
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
			$url_connexion = getUrl("index.php", array("action" => "connexion"));
			$url_deconnexion = getUrl("index.php", array("action" => "deconnexion"));
			$url_gestion_compte = getUrl("index.php", array("action" => "gestionCompte"));
			$url_inscription = getUrl("index.php", array("action" => "inscription"));
			$url_lister_commerce = getUrl("index.php", array("action" => "listerCommerce"));
			$url_lister_client = getUrl("index.php", array("action" => "listerClient"));
			$url_lister_reservation = getUrl("index.php", array("action" => "listerReservation"));
			$url_lister_ses_produit = getUrl("index.php", array("action" => "listerSesProduit"));
			$url_ajouter_produit = getUrl("index.php", array("action" => "ajouterProduit"));
			$url_ajouter_offre = getUrl("index.php", array("action" => "ajouterOffre"));

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
