<?php
$action = $_REQUEST['action'];
$utilisateurs = $pdo->get_util();
$types = $pdo -> getTypeUtil();

switch($action)
{
	case 'ajouter' :
	{
		include_once('vues/v_creationCompteAdmin.php');
		break;
	}
	case 'voir' :
	{
		$utilisateurs = $pdo->get_util();
		include_once('vues/v_utilAdmin.php');
		break;
	}
	case 'supprimer' :
	{
		$idUtil=$_REQUEST['idUtil'];
		$pdo->supprimerUtilBD($idUtil);
		header("location: index.php?uc=gererCompteUtilisateur&action=voir"); //permet de rafraichir la liste des produit après supression
		break;
	}
}
?>