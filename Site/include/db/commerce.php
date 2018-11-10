<?php

include_once "db.php";
include_once "utilisateur.php";

class Commerce extends Utilisateur
{
	public $description = "";
	public $type = "";
	public $tel = "";
}

function listerCommerces()
{
	global $db;

	$c = "SELECT * FROM `commerce`";
	$r = mysqli_query($db, $c);

	$commerces = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$commerce = new Commerce();
		extraireLigne($row, $commerce);
		array_push($commerces, $commerce);
	}

	return $commerces;
}

function commerceExiste($nom, $mdp)
{
	
}

function ajouterCommerce($commerce)
{
	
}

?>
