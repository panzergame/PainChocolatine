<?php

$commerce = commerceConnecte();

 ?>

<h2>Ajouter une Offre</h2>

<?php

$url_ajouter_produit = getUrlIndex("ajouterProduit");
echo "<a href=\"$url_ajouter_produit\">Ajouter un produit</a>";

?>

<form method='post' action='interface/commerce/action/ajouterOffre.php'>

	<p>
		Produit:
		<select name="id">

<?php
	$produit = produitSelectionne();
	$id_default = 0;
	if ($produit !== null) {
		$id_default = $produit->id;
	}

	//On récupère le nom et l'id des produits appartenant au commerce actuellement connecté.
	$produits = listerProduits($commerce);

	foreach ($produits as $produit) {
		$nom = $produit->nom;
		$id = $produit->id;
		if ($id == $id_default) {
			echo "<option value ='$id' selected='selected'>$nom</option>";
		}
		else {
			echo "<option value ='$id'>$nom</option>";
		}
    }
?>

		</select>
	</p>

<?php

	entreeNumeric("qteMaxCumul", "Quantité Maximum", 1, 1);
	entreeNumeric("qteMaxClient", "Quantité Maximum par client", 1, 1);

	entreeHoraire("horaire", "Horaire");
	entreeHoraire("tempsMax", "Temps maximum de récupération après l'horaire");
	buttonEnvoyer("OK");

?>

</form>
