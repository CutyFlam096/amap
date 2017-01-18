

<!-- PARTIE A AMENAGER -->


<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'supprimerArticle' :
	{
		$idProduit=$_REQUEST['idProduit'];
		$pdo->supprimerArticleBD($idProduit);
		header("location: index.php?uc=voirProduits&action=voirCategories"); //permet de rafraichir la liste des produit après supression
		break;
	}
	case 'formulaireModif' :
	{
		$id=$_REQUEST['idProduit'];
		$leProduit=$pdo->identifierProduit($id);
		include("vues/v_modification.php");
		break;
	}
	case 'modifierArticle' :
	{
		$idProduit=$_REQUEST['idProduit'];
		$description=$_REQUEST['description'];
		$prix=$_REQUEST['prix'];
		$idCategorie=$_REQUEST['categorie'];
		$pdo->modifierArticleBD($idProduit, $description, $prix, $idCategorie);
		header("location: index.php?uc=voirProduits&categorie=com&action=voirProduits");
		break;
	}
	case 'formulaireAjout' :
	{
		include("vues/v_ajout.php");
		break;
	}
	case 'ajouterArticle' :
	{
		$description=$_REQUEST['description'];
		$prix=$_REQUEST['prix'];
		$idCategorie=$_REQUEST['categorie'];
		creerArticleBD($description, $prix, $idCategorie);
		header("location: index.php?uc=voirProduits&categorie=com&action=voirProduits");
		break;
	}
}
?>