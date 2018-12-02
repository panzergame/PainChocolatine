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

	<p>
		<label for='nom'>Nom</label>
		<input type="text" name="nom"/>
	</p>

	<p>
		<label for='mdp'>Mot de passe</label>
		<input type="text" name="mdp"/>
	</p>

	<p>
		<label for='email'>Email</label>
		<input type="text" name="email"/>
	</p>

	<p>
		<label for='image'>Image profile</label>
		<input type="file" name="image">
	</p>

	<p id="tel"> 
<!-- TODO default style en none	 -->
		<label for='tel'>Téléphone du commerce</label>
		<input type="text" name="tel"/>
	</p>

	<p id="type">
		<label for='type'>Type du commerce</label>
		<input type="text" name="type"/>
	</p>

	<p id="description">
		<label for='description'>Description du commerce</label>
		<input type="text" name="description"/>
	</p>


	<button name="inscrire">S'inscire'</button>
</form>
