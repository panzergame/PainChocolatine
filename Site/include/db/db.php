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

	$champs = "";
	$valeurs = "";

	$virgule = "";
	foreach ($entite as $key => $value) {
		$champs .= "$virgule `$key`";
		if ($value == null) {
			$valeurs .= "$virgule NULL";
		}
		else {
			$valeurs .= "$virgule '$value'";
		}
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

?>
