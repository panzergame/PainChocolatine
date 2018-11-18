<?php
include_once "include/db.php";
session_start();

$commerce = $_SESSION["commerceConnecte"];

// if ($commerce == null){
// 	// Bug si pas traiter..
// }
 ?>

<section>

<h2>Ajouter une Offre</h2>

<form method='post' action='action/offres.php'>

	<p>
		Produit:
	<select name="produit">

		<?php
		//On récupère le nom et l'id des produits appartenant au commerce actuellement connecté.
	  $produits = listerProduits($commerce);

    foreach ($produits as $produit) {
      $nom = $produit -> nom;
      $id = $produit -> id;

		echo "<option value ='$id'>$nom</option>";
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


</section>
