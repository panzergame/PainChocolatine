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

?>
