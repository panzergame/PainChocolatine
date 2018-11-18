<section>

<h2>Ajouter un Produit</h2>

<form method='post' action='action/produit.php'>
	<p>
		<label for='nom'>Nom</label>
		<input type="text" name="nom"/>
	</p>

	<p>
		<label for='description'>Description</label>
		<input type="text" name="description"/>
	</p>

  <p>
		<label for='prix'>Prix</label>
		<input type="number" step="0.0" name="prix" min ="0.0"/>
	</p>

	<p>
		<label for='action'></label>
		<input type="submit" name="action" value="OK"/>
	</p>

</form>


</section>
