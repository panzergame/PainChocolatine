<?php

$produit = $_SESSION["produit"];
// Toutes les offres du produit précedement selectionné.
$offres = listerOffres($produit);
$nom = $produit->nom;

$client_connecte = isset($_SESSION["clientConnecte"]);

echo "<h1>Liste d'offres de $nom</h1>";

echo "<table>";

echo "<tr>";
echo "<td>Qantité disponible</td>";
echo "<td>Quantité maximal</td>";
echo "<td>Quantité maximal par client</td>";
echo "<td>Horaire</td>";

if ($client_connecte) {
	// Ajout de la colone de reservation.
	echo "<td></td>";
}

echo "</tr>";

foreach ($offres as $offre) {
	$id = $offre->id;
	$qteDispo = $offre->qteDispo;
	$qteMaxCumul = $offre->qteMaxCumul;
	$qteMaxClient = $offre->qteMaxClient;
	$horaire = $offre->horaire;

	echo "<tr>";
	echo "<td>$qteDispo</td>";
	echo "<td>$qteMaxCumul</td>";
	echo "<td>$qteMaxClient</td>";
	echo "<td>$horaire</td>";

    if ($client_connecte) {
		echo "<td>";
		echo "<form action=\"interface/commun/action/offre.php\"    method=\"post\">";
			echo "<button type=\"submit\" name=\"id\" value=\"$id\">Reserver</button>";
			echo "<input type=\"hidden\" name=\"action\" value=\"ajouterReservation\"/>";
		echo "</form>";
		echo "</td>";
	}

	echo "</tr>";
}

echo "</table>";

?>
