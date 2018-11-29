<?php

$db = mysqli_connect("localhost", "root", "root", "projet");
mysqli_set_charset($db, "utf8");

/** Initialise une instance à partir d'une ligne de base de données.
 * Chaque champ de l'instance est nommé de la même façon dans la ligne.
 * \param row La ligne de base de données contenant les valeurs de champ.
 * \param entite L'instance à initialiser.
 */
function extraireLigne($row, &$entite)
{
	foreach ($entite as $key => $value) {
		$entite->$key = $row[$key];
	}
}

/** Insère une ligne dans une table à partir d'une instance.
 * La ligne contient des champs nommés de la même façon que dans l'instance.
 * Modifie l'instance pour récupérer l'id (AI) généré.
 * \param table Nom de la table à modifier.
 * \param entite Instance à ajouter.
 * \return true si l'insersion à reussi, sinon false.
 */
function ecrireLigne($table, &$entite)
{
	global $db;

	// Les champs de la ligne.
	$champs = "";
	// Les valeurs de la ligne.
	$valeurs = "";

	// Caractère séparateur.
	$virgule = "";

	// Inserer tous les champs.
	foreach ($entite as $key => $value) {
		$champs .= "$virgule `$key`";

		// Si null placer NULL.
		if ($value === null) {
			$valeurs .= "$virgule NULL";
		}
		// Sinon la valeur entre ''.
		else {
			$valeurs .= "$virgule '$value'";
		}

		// Les éléments suivant utilise une virgule.
		$virgule = ",";
	}

	$cmd = "INSERT INTO `$table` ($champs) VALUES ($valeurs);";
	$val = mysqli_query($db, $cmd);
	if (!$val) {
		return false;
	}

	$id = mysqli_insert_id($db);
	
	$entite->id = $id;

	return true;
}

/** Test si la reponse d'une requète de base de données est 1 ligne et non vide.
 * \param r La valeur retour de la requète.
 * \return true si la réponse et 1 ligne non vide.
 */
function ligneExiste($r)
{
	// Si la réponse est faux, la requète à échoué.
	return ($r != false && mysqli_num_rows($r) == 1);
}

?>
