<?php
$action = $_REQUEST['action'];
$produits = $pdo->get_produit_admin();
$categories = $pdo->get_categ();

switch($action)
{
	case 'formAjouterArticle' :
	{
		include_once('vues/v_ajoutProduitAdmin.php');
		break;
	}
	case 'ajouterArticle' :
	{
		$type_autorise = array('JPG','jpg','jpeg','jpe','png');
		$dossier_upload = 'img/produits/';//dossier de destination de la photo
		$fichier_upload = $dossier_upload . basename($_FILES["image_produit"]["name"]);
		$type_Image = pathinfo($fichier_upload,PATHINFO_EXTENSION);//recupere le type de l'image
		
		$insertOK = true;
		
		//si aucune image
		
		if( !is_uploaded_file($_FILES['image_produit']['tmp_name']) )
		{
			$insertOK = false;
			include("vues/v_erreur_absence_img.php");
		}
		else
		{
			//verifier si un produit du meme nom existe dans la bdd
			if(file_exists($fichier_upload))
			{//erreut nom en BDD
				$insertOK = false;
				include("vues/v_erreur_nom_bdd.php");
			}
			
			if(in_array($type_Image, $type_autorise) == false)//si le type du fichier est dans $type_aurotise, on l'ajoute et on cree le produit
			{//erreur extension fichier
				$insertOK = false;
				include("vues/v_erreur_type_image.php");
			}
			else
			{
				if(file_exists($fichier_upload))//si le fichier existe
				{//erreur nom image
					$insertOK = false;
					include("vues/v_erreur_nom_image.php");
				}
			}
		}
		
		
		if ($insertOK == true)//si aucune erreur
		{
			move_uploaded_file($_FILES["image_produit"]["tmp_name"], $fichier_upload);
					
			//ajoute le produit
			$insertionProduit = $pdo->nouvProduit($_REQUEST['libelle_produit'],$_REQUEST['description_produit'], $_REQUEST['pu_produit'], $_REQUEST['quantite_produit'], $_SESSION['id'], $_REQUEST['categorie_produit'], $fichier_upload);
			
			if ($insertionProduit == true)
			{header("location: index.php?uc=gererProduit&action=voir");}
			else
			{include("vues/v_erreur_insert_produit.php");}
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
		$id_produit=$_REQUEST['idProduit'];
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