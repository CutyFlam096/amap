<?php
$action = $_REQUEST['action'];
$utilisateurs = $pdo->get_util();
$types = $pdo -> getTypeUtil();

switch($action)
{
	case 'formAjout' :
	{
		include_once('vues/v_creationCompteAdmin.php');
		break;
	}
	case 'ajouter' :
	{
		$login=$_REQUEST['login_utilisateur'];
		$nom=$_REQUEST['nom_utilisateur'];
		$prenom=$_REQUEST['prenom_utilisateur'];
		$addr=$_REQUEST['adresse_utilisateur'];
		$mail=$_REQUEST['mail_utilisateur'];
		$tel=$_REQUEST['tel_utilisateur'];
		$cp=$_REQUEST['code_postal_utilisateur'];
		$ville=$_REQUEST['ville_utilisateur'];
		$type=$_REQUEST['type_utilisateur'];
		$mdp=$_REQUEST['mdp_utilisateur'];
		$mdp2=$_REQUEST['mdp_utilisateur2'];
		
		if ($mdp == $mdp2)
		{
			$pdo->ajouterUtilBD($login, $nom, $prenom, $addr, $mail, $tel, $cp, $ville, $type, $mdp);
			header("location: index.php?uc=gererCompteUtilisateur&action=voir"); 
		}
		else
		{
			header("location: index.php?uc=gererCompteUtilisateur&action=formAjout&erreur=mdp"); 
		}
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
		header("location: index.php?uc=gererCompteUtilisateur&action=voir"); 
		break;
	}
	case 'modifier' :
	{
		$idUtil=$_REQUEST['id_util'];
		$nom=$_REQUEST['nom_util'];
		$prenom=$_REQUEST['prenom_util'];
		$addr=$_REQUEST['adresse_util'];
		$mail=$_REQUEST['mail_util'];
		$tel=$_REQUEST['tel_util'];
		$cp=$_REQUEST['cp_util'];
		$ville=$_REQUEST['ville_util'];
		$login=$_REQUEST['login_util'];
		$type=$_REQUEST['type_utilisateur'];
		
		//echo $idUtil." ".$nom." ".$prenom." ".$addr." ".$mail." ".$tel." ".$cp." ".$ville." ".$login." ".$type." ";
		$pdo->modifierUtilAdminBD($idUtil, $nom, $prenom, $addr, $mail, $tel, $cp, $ville, $login, $type);
		
		header("location: index.php?uc=gererCompteUtilisateur&action=voir"); //permet de rafraichir la liste des produit après supression
		break;
	}
}
?>