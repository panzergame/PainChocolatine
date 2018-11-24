<?php
include_once "include/db/main.php";
include_once "include/get.php";

session_start();
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
			$url_inscription = getUrl("index.php", array("action" => "inscription"));

			if (isset($_SESSION["clientConnecte"])) {
				$client = $_SESSION["clientConnecte"];
				$nom = $client->nom;
				echo "Connecté en tant que client ($nom)";
				echo "<a href=\"$url_deconnexion\">Se déconnecter</a>";
			}
			else if (isset($_SESSION["commerceConnecte"])) {
				$client = $_SESSION["commerceConnecte"];
				$nom = $client->nom;
				echo "Connecté en tant que commerçant ($nom)";
				echo "<a href=\"$url_deconnexion\">Se déconnecter</a>";
			}
			else {
				echo "<a href=\"$url_connexion\">Se connecter</a>";
				echo "<a href=\"$url_inscription\">S'inscrire</a>";
			}
		?>
		</p>
	</header>
