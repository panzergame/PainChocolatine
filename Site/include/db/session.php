<?php
/** \brief Gestion de la session pour la connexion et la selection d'entité à consulté ou modifier.
 */

include_once "client.php";
include_once "commerce.php";
include_once "produit.php";
include_once "offre.php";

session_start();

/** Renvoie la valeur pour la clé $nom dans $_SESSION.
 * Si elle n'existe pas alors null.
 * \param $nom La clé de la valeur à récupérer dans la session.
 */
function getSessionOrNull($nom)
{
	if (isset($_SESSION[$nom])) {
		return $_SESSION[$nom];
	}
	return null;
}

/** Selectionne un commerce pour consulter ses produits.
 * \param commerce Le commerce à selectionner.
 */
function selectionnerCommerce($commerce)
{
	$_SESSION["commerce"] = $commerce;
}

/** Selectionne un produit pour consulter ses offres ou le modifier.
 * \param produit Le produit à selectionner.
 */
function selectionnerProduit($produit)
{
	$_SESSION["produit"] = $produit;
}

/** Selectionne une offre pour procéder à une réservation ou le modifier.
 * \param offre L'offre à selectionner.
 */
function selectionnerOffre($offre)
{
	$_SESSION["offre"] = $offre;
}

/** Renvoie le commerce selectionné.
 * \return Commerce ou null.
 */
function commerceSelectionne()
{
	return getSessionOrNull("commerce");
}

/** Renvoie le produit selectionné.
 * \return Produit ou null.
 */
function produitSelectionne()
{
	return getSessionOrNull("produit");
}

/** Renvoie l'offre selectionnée.
 * \return Offre ou null.
 */
function offreSelectionne()
{
	return getSessionOrNull("offre");
}

/** Connect un client dans la session actuelle.
 * \param client Le client à connecter.
 */
function connecterClient($client)
{
	$_SESSION["clientConnecte"] = $client;
}

/** Connect un commere dans la session actuelle.
 * \param commerce Le commerce à connecter.
 */
function connecterCommerce($commerce)
{
	$_SESSION["commerceConnecte"] = $commerce;
}

/** Renvoie le client actuellement connecté.
 * \return Client ou null.
 */
function clientConnecte()
{
	return getSessionOrNull("clientConnecte");
}

/** Renvoie le commerce actuellement connecté.
 * \return Commerce ou null.
 */
function commerceConnecte()
{
	return getSessionOrNull("commerceConnecte");
}

/** Renvoie l'utilisateur actuellement connecté.
 * \return Utilisateur ou null.
 */
function utilisateurConnecte()
{
	$client = clientConnecte();
	$commerce = commerceConnecte();

	if ($client) {
		return $client;
	}
	if ($commerce) {
		return $commerce;
	}

	return null;
}

/// Deconnecter le client actuel.
function deconnecterClient()
{
	unset($_SESSION["clientConnecte"]);
}

/// Deconnecter le commerce actuel.
function deconnecterCommerce()
{
	unset($_SESSION["commerceConnecte"]);
}

?>
