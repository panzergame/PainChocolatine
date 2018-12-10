<?php

/** Gestion des formulaire et des valeurs par défaut.
 * Le tableau $_SESSION["form"] contient tous les champs valide
 * du formulaire actuel.
 * $_SESSION["error"] prévient d'une erreur (true ou false).
 * $_SESSION["errorMsg"] et le message d'erreur.
 */

include_once "db/session.php";

/** Enregistre la valeur d'un champ valide.
 */
function enregistrerChampValide($nom, $value)
{
	$_SESSION["form"][$nom] = $value;
}

/** Effacer les valeurs de formulaires.
 */
function effacerValeurs()
{
	unset($_SESSION["form"]);
}

/** Récupère la valeur par défaut d'un champ.
 * \param nom Le nom du champ.
 */
function valeurDefautChamp($nom)
{
	if (isset($_SESSION["form"]) and isset($_SESSION["form"][$nom])) {
		return $_SESSION["form"][$nom];
	}
	return "";
}

/** Crée une entrée HTML textuelle de formulaire.
 * \param nom Le nom de l'entrée.
 * \param label Label de l'entrée, nom affiché.
 * \param id L'id du paragraphe autour de l'entrée.
 */
function entreeTexteId($nom, $label, $id)
{
	$defaut = valeurDefautChamp($nom);

	echo "<p id=$id>
			<label for=$nom>$label</label>
			<input type=\"text\" name=$nom value=\"$defaut\"/>
		</p>";
}

/** Crée une entrée HTML textuelle de formulaire.
 * \param nom Le nom de l'entrée.
 * \param label Label de l'entrée, nom affiché.
 */
function entreeTexte($nom, $label)
{
	entreeTexteId($nom, $label, "");
}

/** Crée une entrée HTML d'une horaire de formulaire.
 * \param nom Le nom de l'entrée.
 * \param label Label de l'entrée, nom affiché.
 */
function entreeHoraire($nom, $label)
{
	$defaut = valeurDefautChamp($nom);

	echo "<p>
			<label for=$nom>$label</label>
			<input type=\"time\" name=$nom value=\"$defaut\"/>
		</p>";
}

/** Crée une entrée HTML numérique de formulaire.
 * \param nom Le nom de l'entrée.
 * \param label Label de l'entrée, nom affiché.
 */
function entreeNumeric($nom, $label, $step, $min)
{
	$defaut = valeurDefautChamp($nom);

	echo "<p>
			<label for=$nom>$label</label>
			<input type=\"number\" step=\"$step\" name=$nom min=\"$min\" value=\"$defaut\"/>
		</p>";
}

/** Crée une entrée HTML d'un fichier de formulaire.
 * \param nom Le nom de l'entrée.
 * \param label Label de l'entrée, nom affiché.
 */
function entreeFichier($nom, $label)
{
	$defaut = valeurDefautChamp($nom);

	echo "<p>
			<label for=$nom>$label</label>
			<input type=\"file\" name=$nom value=\"$defaut\"/>
		</p>";
}

/** Crée un boutton d'envoie HTML de formulaire.
 * \param label Label du boutton, nom affiché.
 */
function buttonEnvoyer($label)
{
	echo "<p>
			<label for=\"action\"></label>
			<input type=\"submit\" name=\"action\" value=\"$label\"/>
		</p>";
}

?>
