<?php
$action = $_REQUEST['action'];
$categories = $pdo->get_categ();
$produits = $produits = $pdo->get_produitProducteur($_SESSION['id']);

switch($action)
{
	case 'supprimerArticle' :
	{
		$idProduit=$_REQUEST['idProduit'];
		$pdo->supprimerArticleBD($idProduit);
		header("location: index.php?uc=voirProduitsProducteur"); //permet de rafraichir la liste des produit après supression
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
		$description=$_REQUEST['description_produit'];
		$qteProduit=$_REQUEST['quantite_produit'];
		$prixProduit=$_REQUEST['pu_produit'];
		$idProduit=$_REQUEST['id_produit'];
		
		$pdo->modifierArticleBD($description, $qteProduit, $prixProduit, $idProduit);
		header("location: index.php?uc=voirProduitsProducteur");;
		break;
	}
	case 'formulaireAjout' :
	{
		include("vues/v_ajout.php");
		break;
	}
	case 'ajouterArticle' :
	{
		$type_autorise = array('JPG','jpg','jpeg','jpe','png');
		$dossier_upload = 'img/produits/';//dossier de destination de la photo
		$fichier_upload = $dossier_upload . basename($_FILES["image_produit"]["name"]);
		$type_Image = pathinfo($fichier_upload,PATHINFO_EXTENSION);//recupere le type de l'image
		
		$insertOK = true;
		
		//verifier si un produit du meme nom existe dans la bdd
		if($pdo->verifProduitExiste($_REQUEST['libelle_produit']) == true)
		{//erreut nom en BDD
			$insertOK = false;
			include("vues/v_erreur_nom_bdd.php");
		}
		if(in_array($type_Image, $type_autorise) == false)//si le type du fichier est dans $type_aurotise, on l'ajoute et on cree le produit
		{//erreur extension fichier
			$insertOK = false;
			include("vues/v_erreur_type_image.php");
		}
		
		if(file_exists($fichier_upload))//si le fichier existe
		{//erreur nom image
			$insertOK = false;
			include("vues/v_erreur_nom_image.php");
		}
		
		if ($insertOK == true)//si aucune erreur
		{
			move_uploaded_file($_FILES["image_produit"]["tmp_name"], $fichier_upload);
					
			//ajoute le produit
			$insertionProduit = $pdo->nouvProduit($_REQUEST['libelle_produit'],$_REQUEST['description_produit'], $_REQUEST['pu_produit'], $_REQUEST['quantite_produit'], $_SESSION['id'], $_REQUEST['categorie_produit'], $fichier_upload);
			
			if ($insertionProduit == true)
			{header("location: index.php?uc=voirProduitsProducteur");}
			else
			{include("vues/v_erreur_insert_produit.php");}
		}
		
		break;
	}
	case 'formAjouterArticle' :
	{include("vues/v_formAjoutProduit.php");}
}
?>