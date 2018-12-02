<h2>Ajouter un Produit</h2>

<form method='post' action='interface/commerce/action/ajouterProduit.php' enctype="multipart/form-data">
	<p>
		<label for='nom'>Nom</label>
		<input type="text" name="nom"/>
	</p>

	<p>
		<label for='description'>Description</label>
		<input type="text" name="description"/>
	</p>

	<p>
		<label for='image'>Image</label>
		<input type="file" name="image">
	</p>

	<p>
		<label for='prix'>Prix</label>
		<input type="number" step="0.01" name="prix" min ="0.0"/>
	</p>

	<p>
		<label for='action'></label>
		<input type="submit" name="action" value="OK"/>
	</p>
</form>
