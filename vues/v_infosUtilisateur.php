<?php
	echo"
	<div class='container'>
		<div class='form-group col-lg-10 ' >
			<h1>Informations du compte</h1>
			<form method='post' action='index.php?uc=infoCompte&action=modif'>
				<label for='nom_util'>Nom</label>
				<input id='nom_' name='nom_util' value ='".$_SESSION['nom']."' id='nom_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkLastName()'/>
				
				<label for='prenom_util'>Prenom</label>
				<input id='prenom_' name='prenom_util' value ='".$_SESSION['prenom']."' id='prenom_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkFirstName()'/>
				
				<label for='adresse_util'>Adresse</label>
				<input id='adresse_' name='adresse_util' value ='".$_SESSION['adresse']."' id='adresse_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkAdresse()'/>
				
				<label for='mail_util'>Mail</label>
				<input id='mail_' name='mail_util' value ='".$_SESSION['mail']."' id='mail_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkMail()'/>
				
				<label for='tel_util'>Tel</label>
				<input id='tel_' name='tel_util' value ='".$_SESSION['tel']."' id='tel_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkPhone()'/>
				
				<label for='cp_util'>CP</label>
				<input id='code_postal_' name='cp_util' value ='".$_SESSION['codepostal']."' id='cp_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkCodePostal()'/>
				
				<label for='ville_util'>Ville</label>
				<input id='ville_' name='ville_util' value ='".$_SESSION['ville']."' id='ville_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkVille()'/>
				
				<label for='login_util'>Login</label>
				<input readonly='readonly' name='login_util' value ='".$_SESSION['login']."' id='login_util' type='text' class='form-control' size='30' maxlength='45' onblur='checkLogin()'/></br>
				
				<label for='ancien_mdp'>MDP</label></br>
				Ancien MDP<input name='ancien_mdp' id='ancien_mdp' type='password' class='form-control' size='30' maxlength='45' />
				Nouveau MDP<input name='nouv_mdp'  id='nouv_mdp' type='password' class='form-control' size='30' maxlength='45' onblur='checkPswd()'/>
				Confirmer Nouveau MDP<input name='nouv_mdp2' id='nouv_mdp2' type='password' class='form-control' size='30' maxlength='45' onblur='checkSamePswd()'/>
				</br>
				<input type='submit' value='Valider les modifications' class='btn btn-primary'>
				<input type='reset' value='Annuler les modifications' class='btn btn-primary'>
			</form>
		</div>
	</div>";