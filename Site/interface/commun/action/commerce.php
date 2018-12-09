<?php

/** \brief Créer une session avec un commerce par son "id".
 * Redirige sur index.php avec "action" en argument _GET.
 */

include_once "../../../include/db/session.php";
include_once "../../../include/db/commerce.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

valeurValideNumericPost("id");
valeurValidePost("action");

if ($id_valid and $action_valid) {
	$commerce = obtenirCommerceId($id);
	selectionnerCommerce($commerce);

	$url = getUrl("../../../index.php", array("action" => $action));
	redirigerUrl($url);
}

?>
