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
		if ( isset($_SESSION['alreadyExists']) )
		{
			unset($_SESSION['alreadyExists']);
		}

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

			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['adresse']=$adresse;
			$_SESSION['ville']=$ville;
			$_SESSION['codePostal']=$codePostal;
			$_SESSION['tel']=$tel;
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
}
?>