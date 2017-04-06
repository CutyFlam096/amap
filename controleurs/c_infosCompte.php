<?php
if ($_REQUEST['action'] == "modif")
{
	$id = $_SESSION['id'];
	$nom_util = $_POST['nom_util'];
	$prenom_util = $_POST['prenom_util'];
	$adresse_util = $_POST['adresse_util'];
	$mail_util = $_POST['mail_util'];
	$tel_util = $_POST['tel_util'];
	$cp_util = $_POST['cp_util'];
	$ville_util = $_POST['ville_util'];
	$login_util = $_POST['login_util'];
	$ancien_mdputil = $_POST['ancien_mdp'];
	$nouvmdp_util = $_POST['nouv_mdp'];
	$nouvmdp2_util = $_POST['nouv_mdp2'];
	
	if ($ancien_mdputil == "" && $nouvmdp_util == "" && $nouvmdp2_util == "")
	{
		echo "MDP ok";
		$change_param = $pdo->set_param_compte_no_mdp($id, $nom_util, $prenom_util, $adresse_util, $mail_util, $tel_util, $cp_util, $ville_util, $login_util);
		if ( $change_param )
		{
			echo "changement parametre compte ok";
		}
		header('Location: index.php?uc=infoCompte&action=voir');
	}
	
	else if (password_verify($ancien_mdputil, $_SESSION['mdp']) && $nouvmdp_util == $nouvmdp2_util)
	{
		$change_param = $pdo->set_param_compte($id, $nom_util, $prenom_util, $adresse_util, $mail_util, $tel_util, $cp_util, $ville_util, $login_util, $nouvmdp_util);
		if ( $change_param )
		{
			echo "changement parametre comtpe ok";
		}
		header('Location: index.php?uc=infoCompte&action=voir');
	}
	else
	{
		echo "MDP NO OK!!!";
	}


}

elseif ($_REQUEST['action'] == "voir")
{
	include("vues/v_infosUtilisateur.php");
}