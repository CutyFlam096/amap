<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'formInscription' :
	{
		include_once('vues/v_inscriptionConsommateur.php');
		break;
	}
	case 'inscription' :
	{
		$login = $_POST['login_consommateur'];
		$nom = $_POST['nom_consommateur'];
		$prenom = $_POST['prenom_consommateur'];
		$adresse = $_POST['adresse_consommateur'];
		$mail = $_POST['mail_consommateur'];
		$tel = $_POST['tel_consommateur'];
		$codePostal = $_POST['code_postal_consommateur'];
		$ville = $_POST['ville_consommateur'];
		$mdp = $_POST['mdp_consommateur'];
		$mdp2 = $_POST['mdp_consommateur2'];

		$creation = $pdo->verifierCompteExistant($login, $mail);

		if ( $creation )
		{
			$_SESSION['alreadyExists'] = true;

			header('Location: index.php?uc=connexionConsommateur&action=formInscription');
		}
		else
		{
			$pdo->set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $codePostal, $ville, $mdp, 3);
		}
		break;
	}
	case 'connexion' :
	{
		include_once('vues/v_connexionConsommateur.php');
		break;
	}
	
	case 'verifConnexion':
	{
		if (isset($_POST['login_consommateur'])) 
		{
		  $test_compte = $pdo->set_connexion($_POST['login_consommateur'],  $_POST['mdp_consommateur']);
			/*
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
			*/
		} 
		else if (isset($_POST['login_producteur']))
		{
		  $test_compte = $pdo->set_connexion($_POST['login_producteur'], $_POST['mdp_producteur']);
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