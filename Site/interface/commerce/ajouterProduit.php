<h2>Ajouter un Produit</h2>

<form method='post' action='interface/commerce/action/ajouterProduit.php' enctype="multipart/form-data">

<?php

	entreeTexte("nom", "Nom");
	entreeTexte("description", "Description");
	entreeFichier("image", "Image");
	entreeNumeric("prix", "Prix", 0.01, 0.0);
	buttonEnvoyer("OK");

?>

</form>
