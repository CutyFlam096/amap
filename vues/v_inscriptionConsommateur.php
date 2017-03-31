<div class='container'>
<p>Inscription consommateur</p>
<?php
	if ( isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists'] )
	{
?>
	<div class='form-group'>
		<form method='POST' action='index.php?uc=connexionConsommateur&action=inscription'>
				<label for='login_consommateur'>Login</label>
				<input name='login_consommateur' id='login_consommateur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkLogin()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='nom_consommateur'>Nom</label>
				<input name='nom_consommateur' id='nom_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['nom']; ?>' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_consommateur'>Prenom</label>
				<input name='prenom_consommateur' id='prenom_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['prenom']; ?>' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_consommateur'>Adresse</label>
				<input name='adresse_consommateur' id='adresse_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['adresse']; ?>' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_consommateur'>Mail</label>
				<input name='mail_consommateur' id='mail_consommateur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkMail()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='tel_consommateur'>Tel</label>
				<input name='tel_consommateur' id='tel_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['tel']; ?>' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_consommateur'>Code postal</label>
				<input name='code_postal_consommateur' id='code_postal_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['codePostal']; ?>' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_consommateur'>Ville</label>
				<input name='ville_consommateur' id='ville_consommateur' type='text' class='form-control' value='<?php echo $_SESSION['ville']; ?>' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_consommateur'>MDP</label>
				<input name='mdp_consommateur' id='mdp_consommateur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				confirmer MDP
				<input name='mdp_consommateur2' id='mdp_consommateur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
<?php
	}
	else
	{
?>
		<div class='form-group'>
		<form method='POST' action='index.php?uc=connexionConsommateur&action=inscription'>
				<label for='login_consommateur'>Login</label>
				<input name='login_consommateur' id='login_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLogin()">
				
				<label for='nom_consommateur'>Nom</label>
				<input name='nom_consommateur' id='nom_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_consommateur'>Prenom</label>
				<input name='prenom_consommateur' id='prenom_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_consommateur'>Adresse</label>
				<input name='adresse_consommateur' id='adresse_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_consommateur'>Mail</label>
				<input name='mail_consommateur' id='mail_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkMail()">
				
				<label for='tel_consommateur'>Tel</label>
				<input name='tel_consommateur' id='tel_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_consommateur'>Code postal</label>
				<input name='code_postal_consommateur' id='code_postal_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_consommateur'>Ville</label>
				<input name='ville_consommateur' id='ville_consommateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_consommateur'>MDP</label>
				<input name='mdp_consommateur' id='mdp_consommateur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				confirmer MDP
				<input name='mdp_consommateur2' id='mdp_consommateur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
<?php
	}
?>
</div>