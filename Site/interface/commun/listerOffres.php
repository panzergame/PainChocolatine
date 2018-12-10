<?php

$produit = produitSelectionne();
// Toutes les offres du produit précedement selectionné.
$offres = listerOffres($produit);
$nom = $produit->nom;

$client_connecte = (clientConnecte() !== null);

echo "<h1>Liste d'offres de $nom</h1>";

echo "<table>";

echo "<tr id=\"entete\">";
echo "<td>Qantité disponible</td>";
echo "<td>Quantité maximal</td>";
echo "<td>Quantité maximal par client</td>";
echo "<td>Horaire</td>";
echo "<td>Temps maximum de récupération</td>";

if ($client_connecte) {
	// Ajout de la colone de reservation ou suppression.
	echo "<td></td>";
}

echo "</tr>";

foreach ($offres as $offre) {
	$id = $offre->id;
	$qteDispo = $offre->qteDispo;
	$qteMaxCumul = $offre->qteMaxCumul;
	$qteMaxClient = $offre->qteMaxClient;
	$horaire = $offre->horaire;
	$tempsMax = $offre->tempsMax;

	echo "<tr>";
	echo "<td>$qteDispo</td>";
	echo "<td>$qteMaxCumul</td>";
	echo "<td>$qteMaxClient</td>";
	echo "<td>$horaire</td>";
	echo "<td>$tempsMax</td>";

    if ($client_connecte) {
		echo "<td>";
		if ($qteDispo > 0) {
			echo "<form action=\"interface/commun/action/offre.php\"    method=\"post\">";
				echo "<button type=\"submit\" name=\"id\" value=\"$id\">Reserver</button>";
				echo "<input type=\"hidden\" name=\"action\" value=\"ajouterReservation\"/>";
			echo "</form>";
		}
		echo "</td>";
	}

	echo "</tr>";
}

echo "</table>";

?>
