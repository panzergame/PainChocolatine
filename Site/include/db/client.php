<?php

include_once "db.php";
include_once "utilisateur.php";

class Client extends Utilisateur
{
	
}

/** Renvoi une liste de tous les clients
 * \return liste de Client.
 */
function listerClients()
{
	global $db;

	$c = "SELECT * FROM `client`";
	$r = mysqli_query($db, $c);

	$clients = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$client = new Client();
		extraireLigne($row, $client);
		array_push($clients, $client);
	}

	return $clients;
}

/** Renvoi un client ou null selon les informations de connexion.
 * \param nom Nome du client.
 * \param mdp Mot de passe du client.
 * \return Client ou null.
 */
function obtenirClientConnexion($nom, $mdp)
{
	global $db;

	$c = "SELECT * FROM `client` WHERE nom = '$nom' AND mdp = '$mdp'";
	$r = mysqli_query($db, $c);

	if ($r != false && mysqli_num_rows($r)) {
		$row = mysqli_fetch_assoc($r);
		$client = new Client();
		extraireLigne($row, $client);
		return $client;
	}

	return null;
}

function ajouterClient($client)
{
	
}

?>
