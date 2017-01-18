<div class='container'>
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
		$codepostal = $_POST['code_postal_consommateur'];
		$ville = $_POST['ville_consommateur'];
		$mdp = $_POST['mdp_consommateur'];
		$mdp2 = $_POST['mdp_consommateur2'];
  
		if (verifierCompteExistant($login, $mail))
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
			if ($mdp == $mdp2)
			{
				$creationCompte = set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $codepostal, $ville, $mdp, 3);
			}
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
</div>