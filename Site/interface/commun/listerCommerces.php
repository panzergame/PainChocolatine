<?php

include_once "include/db/main.php";

function afficherClass($inst)
{
	if ($inst === null) {
		echo "NULL";
	}
	else {
		echo "<ul>";
		foreach ($inst as $key => $value) {
			echo "<li>$key : $value</li>";
		}
		echo "</ul>";
	}
}

function afficherListe($liste)
{
	foreach ($liste as $elem) {
		afficherClass($elem);
		echo "</br>";
	}
}

echo "<p>commerces : </p>";

$commerces = listerCommerces();
afficherListe($commerces);

?>
