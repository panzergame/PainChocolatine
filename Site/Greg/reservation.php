<?php
	session_start();
	$error = false;
	$client = $_SESSION["clientConnecte"];
	if(isset($clientConnecte) and isset($_POST["action"])){
		$offre = $_SESSION["offre"];
		$qte = $_POST["qte"];
	
		if($offre["qteDispo"] <= $qte && $offre["qteMaxClient"] <= $qte){
			$error = true;
		}
	}
	else{
		$error= true;
	}
	
	if ($error){
			$_SESSION["error"] = $_POST;
			header("Location:../ajouterReservation.php");
		}
	else{
		unset($_SESSION["error"]);
		ajouterReservation($client,$offre,$qte);
		header("Location:../acceuil.php");
	}
?>