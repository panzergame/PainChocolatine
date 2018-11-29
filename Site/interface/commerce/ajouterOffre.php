<?php

$commerce = commerceConnecte();

 ?>

<h2>Ajouter une Offre</h2>

<?php

$url_ajouter_produit = getUrl("index.php", array("action" => "ajouterProduit"));
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

	<p>
		<label for='qteMaxCumul'> Quantité Maximum</label>
		<input type="number" name="qteMaxCumul" min="1" />
	</p>

	<p>
		<label for='qteMaxClient'>Quantité Maximum par client</label>
		<input type="number" name="qteMaxClient" min="1"/>
	</p>

	<p>
		<label for='horaire'>Horaire</label>
		<input type="time" name="horaire"/>
	</p>

	<p>
		<label for='action'></label>
		<input type="submit" name="action" value="OK"/>
	</p>

</form>
