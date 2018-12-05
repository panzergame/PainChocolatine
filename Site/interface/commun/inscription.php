<script type="text/javascript">

function update(option)
{
	var status = "block";
	if (option.value == "client") {
		status = "none";
	}

	document.getElementById("tel").style.display = status;
	document.getElementById("type").style.display = status;
	document.getElementById("description").style.display = status;
}

</script>

<form method='post' action='interface/commun/action/inscription.php' enctype="multipart/form-data">
	<p>
		<label for='categorie'>Catégorie</label>
		<select name="categorie">
			<option value="client" onclick="update(this)">Client</option>
			<option value="commerce" onclick="update(this)">Commerce</option>
		</select>
	</p>

<?php

	entreeTexte("nom", "Nom");
	entreeTexte("mdp", "mot de passe");
	entreeTexte("email", "Email");
	entreeFichier("image", "Image profile");
	entreeTexteId("tel", "Téléphone du commerce", "tel");
	entreeTexteId("type", "Type du commerce", "type");
	entreeTexteId("description", "Description du commerce", "description");

	buttonEnvoyer("S'inscrire");

?>

</form>
