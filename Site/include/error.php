<?php

/** Teste la présence et la validité (non vide) d'un champ de formulaire.
 * Créer les variables globales $[nom] et $[nom]_valid. $[nom] contient la
 * valeur du champs si il est valide, $[nom]_valid est un booleen à vrai
 * si le champ est valide.
 * \param nom Le nom du champ.
 */
function valeurValidePost($nom)
{
	if (isset($_POST[$nom]) and !empty($_POST[$nom])) {
		$GLOBALS[$nom] = strip_tags($_POST[$nom]);
		$GLOBALS[$nom . "_valid"] = true;
	}
	else {
		$GLOBALS[$nom . "_valid"] = false;
	}
}

/** Teste la présence et la validité comme valeurValidePost mais aussi que
 * la valeur est numérique.
 * \param nom Le nom du champ.
 */
function valeurValideNumericPost($nom)
{
	if (isset($_POST[$nom]) and !empty($_POST[$nom]) and is_numeric($_POST[$nom])) {
		$GLOBALS[$nom] = $_POST[$nom];
		$GLOBALS[$nom . "_valid"] = true;
	}
	else {
		$GLOBALS[$nom . "_valid"] = false;
	}
}

?>
