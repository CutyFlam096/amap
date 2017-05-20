<div class='container'>
<p>Inscription producteur</p>
<?php
	if ( isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists'] )
	{
?>
	<div class='form-group'>
		<form method='POST' action='index.php?uc=connexionProducteur&action=inscription'>
				<label for='login_producteur'>Login</label>
				<input name='login_producteur' id='login_producteur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkLogin()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='nom_producteur'>Nom</label>
				<input name='nom_producteur' id='nom_producteur' type='text' class='form-control' value='<?php echo $_SESSION['nom']; ?>' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_producteur'>Prénom</label>
				<input name='prenom_producteur' id='prenom_producteur' type='text' class='form-control' value='<?php echo $_SESSION['prenom']; ?>' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_producteur'>Adresse</label>
				<input name='adresse_producteur' id='adresse_producteur' type='text' class='form-control' value='<?php echo $_SESSION['adresse']; ?>' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_producteur'>Mail</label>
				<input name='mail_producteur' id='mail_producteur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkMail()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='tel_producteur'>Téléphone</label>
				<input name='tel_producteur' id='tel_producteur' type='text' class='form-control' value='<?php echo $_SESSION['tel']; ?>' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_producteur'>Code postal</label>
				<input name='code_postal_producteur' id='code_postal_producteur' type='text' class='form-control' value='<?php echo $_SESSION['codePostal']; ?>' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_producteur'>Ville</label>
				<input name='ville_producteur' id='ville_producteur' type='text' class='form-control' value='<?php echo $_SESSION['ville']; ?>' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_producteur'>Mot de passe</label>
				<input name='mdp_producteur' id='mdp_producteur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				Confirmer mot de passe
				<input name='mdp_producteur2' id='mdp_producteur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
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
		<form method='POST' action='index.php?uc=connexionProducteur&action=inscription'>
				<label for='login_producteur'>Login</label>
				<input name='login_producteur' id='login_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLogin()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='nom_producteur'>Nom</label>
				<input name='nom_producteur' id='nom_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_producteur'>Prénom</label>
				<input name='prenom_producteur' id='prenom_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_producteur'>Adresse</label>
				<input name='adresse_producteur' id='adresse_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_producteur'>Mail</label>
				<input name='mail_producteur' id='mail_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkMail()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='tel_producteur'>Téléphone</label>
				<input name='tel_producteur' id='tel_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_producteur'>Code postal</label>
				<input name='code_postal_producteur' id='code_postal_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_producteur'>Ville</label>
				<input name='ville_producteur' id='ville_producteur' type='text' class='form-control' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_producteur'>Mot de passe</label>
				<input name='mdp_producteur' id='mdp_producteur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				Confirmer mot de passe
				<input name='mdp_producteur2' id='mdp_producteur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
<?php
	}
?>
</div>