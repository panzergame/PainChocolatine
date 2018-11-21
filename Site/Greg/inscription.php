<?php
	session_start();
	$error = false;
	
	/*detection d'erreur dans l'inscription*/
	if(!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["mdp"])){
		$nom = $_POST["nom"];
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
	}
	else{
		$error = true;
	}
	
	/*gestion en cas d'erreur*/
	if($error){
		$_SESSION["error"] = $_POST;
		header("Location:../../commun/inscription.php");
	}
	else{
		unset($_SESSION["error"]);
		$client = ajouterClient($nom,$mdp,$email);
		$_SESSION["clientConnecte"] = $client;
		header("Location:../acceuil.php");
	}
?>