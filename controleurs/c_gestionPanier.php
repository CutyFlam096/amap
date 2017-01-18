<?php

if($_REQUEST['action'] == "voir")
{
	include("vues/v_panier.php");
}
elseif($_REQUEST['action'] == "supprimer")
{
	supprimerArticle($_REQUEST['libelleProduit']);
	include("vues/v_panier.php"); //retourne sur le panier
}
elseif($_REQUEST['action'] == "viderPanier")
{
	supprimePanier();
	include("vues/v_panier.php"); //retourne sur le panier
}
elseif($_REQUEST['action'] == "ajouter")
{
	/**
	echo $_REQUEST['idProduit'];
	echo $_POST['qte_produit'];
 	echo $_REQUEST['libelleProduit'];
	echo $_REQUEST['prixProduit'];
	**/
	ajouterArticle($_REQUEST['idProduit'],$_REQUEST['libelleProduit'],$_REQUEST['descriptionProduit'],$_POST['qte_produit'],$_REQUEST['prixProduit']);
	include("vues/v_panier.php"); //retourne sur le panier
}
elseif($_REQUEST['action'] == "modifier")
{
	modifierQTeArticle($_REQUEST['libelleProduit'],$_POST['quantiteProd']);
	include("vues/v_panier.php"); //retourne sur le panier
}


