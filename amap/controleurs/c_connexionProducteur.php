<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'formInscription' :
	{
		include_once('vues/v_inscriptionProducteur.php');
		break;
	}
	case 'inscription' :
	{
		$login = $_POST['login_producteur'];
		$nom = $_POST['nom_producteur'];
		$prenom = $_POST['prenom_producteur'];
		$adresse = $_POST['adresse_producteur'];
		$mail = $_POST['mail_producteur'];
		$tel = $_POST['tel_producteur'];
		$codePostal = $_POST['code_postal_producteur'];
		$ville = $_POST['ville_producteur'];
		$mdp = $_POST['mdp_producteur'];
		$mdp2 = $_POST['mdp_producteur2'];

		$creation = $pdo->verifierCompteExistant($login, $mail);

		if ( $creation )
		{
			$_SESSION['alreadyExists'] = true;

			header('Location: index.php?uc=connexionProducteur&action=formInscription');
		}
		else
		{
			$pdo->set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $codePostal, $ville, $mdp, 3);
		}
		break;
	}
	case 'connexion' :
	{
		include_once('vues/v_connexionProducteur.php');
		break;
	}
	
	case 'verifConnexion':
	{
		if (isset($_POST['login_producteur'])) 
		{
		  $test_compte = $pdo->set_connexion($_POST['login_producteur'], $_POST['mdp_producteur']);
		} 
		else if (isset($_POST['login_producteur']))
		{
		  $test_compte = $pdo->set_connexion($_POST['login_producteur'], $_POST['mdp_producteur']);
			echo $_SESSION['nom']."</br>"; 
			echo $_SESSION['prenom']."</br>"; 
			echo $_SESSION['adresse']."</br>"; 
			echo $_SESSION['mail']."</br>"; 
			echo $_SESSION['tel']."</br>"; 
			echo $_SESSION['codepostal']."</br>"; 
			echo $_SESSION['ville']."</br>"; 
			echo $_SESSION['mdp']."</br>"; 
			echo $_SESSION['login']."</br>"; 
			echo $_SESSION['id_Type_utilisateur']."</br>"; 
		  }

		if ($test_compte)
		{
			/**
			echo $_SESSION['nom']."</br>"; 
			echo $_SESSION['prenom']."</br>"; 
			echo $_SESSION['adresse']."</br>"; 
			echo $_SESSION['mail']."</br>"; 
			echo $_SESSION['tel']."</br>"; 
			echo $_SESSION['codepostal']."</br>"; 
			echo $_SESSION['ville']."</br>"; 
			echo $_SESSION['mdp']."</br>"; 
			echo $_SESSION['login']."</br>"; 
			echo $_SESSION['id_Type_utilisateur']."</br>"; 
			**/
			header('Location: index.php');    
		}
		else
		{
			include_once('vues/v_erreurMdpPseudo.php');
		}
	}
}
?>