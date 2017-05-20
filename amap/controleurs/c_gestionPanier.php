<?php

if($_REQUEST['action'] == "voir")
{
	include("vues/v_panier.php");
}
else if($_REQUEST['action'] == "supprimer")
{
	$pdo->supprimerArticle($_REQUEST['libelleProduit']);
	include("vues/v_panier.php"); //retourne sur le panier
}
elseif($_REQUEST['action'] == "viderPanier")
{
	$pdo->supprimePanier();
	include("vues/v_panier.php"); //retourne sur le panier
}
else if($_REQUEST['action'] == "ajouter")
{
	/**
	echo $_REQUEST['idProduit']."</br>";
	echo $_POST['qte_produit']."</br>";
 	echo $_REQUEST['libelleProduit']."</br>";
	echo $_REQUEST['prixProduit']."</br>";
	echo $_REQUEST['imageProduit'];
	**/
	
	$pdo->ajouterArticle($_REQUEST['idProduit'],$_REQUEST['imageProduit'],$_REQUEST['libelleProduit'],$_REQUEST['descriptionProduit'],$_REQUEST['qte_produit'],$_REQUEST['prixProduit']);
	include("vues/v_panier.php"); //retourne sur le panier
}
else if($_REQUEST['action'] == "modifier")
{
	$pdo->modifierQTeArticle($_REQUEST['libelleProduit'],$_POST['quantiteProd']);
	include("vues/v_panier.php"); //retourne sur le panier
}


