<div class='container'>
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
		$codepostal = $_POST['code_postal_producteur'];
		$ville = $_POST['ville_producteur'];
		$mdp = $_POST['mdp_producteur'];
		$mdp2 = $_POST['mdp_producteur2'];
  
		if (verifierCompteExistant($login, $mail))
		{
			$_SESSION['alreadyExists'] = true;

			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['adresse']=$adresse;
			$_SESSION['ville']=$ville;
			$_SESSION['codePostal']=$codePostal;
			$_SESSION['tel']=$tel;
			header('Location: index.php?uc=connexionProducteur&action=formInscription');
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
		include_once('vues/v_connexionProducteur.php');
		break;
	}
}
?>	
</div>