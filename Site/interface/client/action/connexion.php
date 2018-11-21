<?php

session_start();

$error = false;
$nom = $_POST["nom"]; 
$mdp = $_POST["mdp"];

$connexion = obtenirClientConnexion($nom,$mdp);
if($connexion = null){
	$erreur = True;
}

if ($error){
	$_SESSION["error"]["nom"] = $_POST["nom"];
	header("Location:../../commun/connexion.php");
}
else{
	unset($_SESSION["error"]);
	$_SESSION["clientConnecte"] = $connexion;
	header("Location:../acceuil.php");
}

?>
