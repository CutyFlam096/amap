<?php
$action = $_REQUEST['action'];
$categories = $pdo->get_categ();

switch($action)
{
	case 'ajout' :
	{
		$nomCateg=$_REQUEST['nomCateg'];
		$pdo->ajouterCategorieBD($nomCateg);
		header("location: index.php?uc=gererCategorie&action=voir"); //permet de rafraichir la liste des produit après supression
		break;
	}
	case 'voir' :
	{
		include_once('vues/v_categorieAdmin.php');
		break;
	}
	case 'supprimer' :
	{
		$idCategorie=$_REQUEST['idProduit'];
		$pdo->supprimerCategorieBD($idCategorie);
		header("location: index.php?uc=gererCategorie&action=voir"); //permet de rafraichir la liste des produit après supression
		break;
	}
}
?>