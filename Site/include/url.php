<?php

/** Renvoie une url avec les arguments en format GET à la fin de l'url.
 * \param url L'url de base
 * \param args Les arguments GET sous la forme d'un tableau associatif (argument => valeur).
 */
function getUrl($url, $args)
{
	$url_final = $url . "?";

	$sep = "";
	foreach ($args as $key => $value) {
		$url_final .= $sep . $key . "=" . $value;
		$sep = "&";
	}

	return $url_final;
}

/** Redirige vers une page.
 * \param url La page cible de la redirection.
 */
function redirigerUrl($url)
{
	Header("Location: $url");
}

/** Produit l'url vers l'index avec un champs "action" au format GET.
 * \param action L'action passé en argument GET à l'index.
 */
function getUrlIndex($action)
{
	return getUrl("/usmb/index.php", array("action" => $action)); // TODO nom statique…
}

?>
