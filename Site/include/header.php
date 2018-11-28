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
		<p>
		<?php
			$url_connexion = getUrl("index.php", array("action" => "connexion"));
			$url_deconnexion = getUrl("index.php", array("action" => "deconnexion"));
			$url_gestion_compte = getUrl("index.php", array("action" => "gestionCompte"));
			$url_inscription = getUrl("index.php", array("action" => "inscription"));
			$url_lister_commerce = getUrl("index.php", array("action" => "listerCommerce"));
			$url_lister_client = getUrl("index.php", array("action" => "listerClient"));
			$url_lister_reservation = getUrl("index.php", array("action" => "listerReservation"));
			$url_lister_produit = getUrl("index.php", array("action" => "listerProduit"));

			$client = clientConnecte();
			$commerce = commerceConnecte();

			if ($client !== null or $commerce !== null) {
				if ($client !== null) {
					$nom = $client->nom;
					echo "Connecté en tant que client ($nom)";
				}
				else if ($commerce !== null) {
					$nom = $commerce->nom;
					echo "Connecté en tant que commerçant ($nom)";
				}

				echo "<a href=\"$url_gestion_compte\">Gestion</a>";
				echo "<a href=\"$url_deconnexion\">Se déconnecter</a>";

				if ($client !== null) {
					echo "<a href=\"$url_lister_commerce\">Les commerces</a>";
					echo "<a href=\"$url_lister_reservation\">Ses résérvations</a>";
				}
				else if ($commerce !== null) {
					echo "<a href=\"$url_lister_client\">Ses clients</a>";
					echo "<a href=\"$url_lister_produit\">Ses produits</a>";
				}
			}
			else {
				echo "<a href=\"$url_connexion\">Se connecter</a>";
				echo "<a href=\"$url_inscription\">S'inscrire</a>";
			}
		?>
		</p>
	</header>
