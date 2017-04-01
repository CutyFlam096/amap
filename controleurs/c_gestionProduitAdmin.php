<?php
$action = $_REQUEST['action'];
$produits = $pdo->get_produit_admin();
switch($action)
{
	case 'formAjouterArticle' :
	{
		include_once('vues/v_ajoutProduitAdmin.php');
		break;
	}
	case 'ajouter' :
	{
		if ($mdp == $mdp2)
		{
			$pdo->ajouterUtilBD($login, $nom, $prenom, $addr, $mail, $tel, $cp, $ville, $type, $mdp);
			header("location: index.php?uc=gererProduit&action=voir"); 
		}
		else
		{
			header("location: index.php?uc=gererProduit&action=formAjout&erreur=mdp"); 
		}
		break;
	}
	case 'voir' :
	{
		
		include_once('vues/v_utilProduits.php');
		break;
	}
	case 'supprimer' :
	{
		$id_produit=$_REQUEST['id_produit'];
		$pdo->supprimerArticleBD($id_produit);
		header("location: index.php?uc=gererProduit&action=voir"); 
		break;
	}
	case 'modifier' :
	{
		$id=$_REQUEST['id_produit'];
		$description=$_REQUEST['description_produit'];
		$qte=$_REQUEST['quantite_produit'];
		$prix=$_REQUEST['pu_produit'];
		
		$pdo->modifierArticleBD($description, $qte, $prix, $id);
		
		header("location: index.php?uc=gererProduit&action=voir"); //permet de rafraichir la liste des produit après supression
		break;
	}
}
?>