<?php
$url_connexion_client = getUrl("index.php", array("action" => "connexionClient"));
$url_connexion_commerce = getUrl("index.php", array("action" => "connexionCommerce"));
?>

<form method='post' action='interface/commun/action/connexion.php'>
	<p>
		<label for='nom'>Nom</label>
		<input type="text" name="nom"/>
	</p>

	<p>
		<label for='mdp'>Mot de passe</label>
		<input type="text" name="mdp"/>
	</p>

	<button name="client">Se connecter en tant que client</button>
	<button name="commerce">Se connecter en tant que commerce</button>
</form>
