<h2> Supprimer votre compte ? </h2>

<?php

$client_connecte = (clientConnecte() !== null);
$commerce_connecte = (commerceConnecte() !== null);

?>


<form method='post' action='
<?php

if ($client_connecte) {
	echo "interface/client/action/suppressionCompte.php";
}
else if ($commerce_connecte) {
	echo "interface/commerce/action/suppressionCompte.php";
}

?>

'>
	<p>
		<label for='mdp'>Mot de passe</label>
		<input type="text" name="mdp"/>
	</p>

	<p>
		<button type="submit" name="send" value="supprimer">Supprimer</button>
	</p>
</form>
