<?php

$produit = $_SESSION["produit"];
// Toutes les offres du produit précedement selectionné.
$offres = listerOffres($produit);

echo "<h1>Liste d'offres</h1>";

echo "<table>";

echo "<tr>";
echo "<td>Qantité disponible</td>";
echo "<td>Quantité maximal</td>";
echo "<td>Quantité maximal par client</td>";
echo "<td>Horaire</td>";
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
	/*echo "<td>";
	echo "<form action=\"interface/commun/action/produit.php\" method=\"post\">";
		echo "<button type=\"submit\" name=\"id\" value=\"$id\">Voir les offres</button>";
		echo "<input type=\"hidden\" name=\"action\" value=\"listerOffre\"/>";
	echo "</form>"; // TODO gregory
	echo "</td>";*/
	
	echo "</tr>";
}

echo "</table>";

?>
