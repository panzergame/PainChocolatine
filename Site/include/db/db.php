<?php

$db = mysqli_connect("localhost", "root", "root", "projet");
mysqli_set_charset($db, "utf8");

function extraireLigne($row, &$entite)
{
	foreach ($entite as $key => $value) {
		$entite->$key = $row[$key];
	}
}

?>
