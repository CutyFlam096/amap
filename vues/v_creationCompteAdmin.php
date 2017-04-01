<div class='container'>
	<p>Creation d'un utilisateur</p>
	<div class='form-group'>
		<form method='POST' action='index.php?uc=gererCompteUtilisateur&action=ajouter'>
				<label for='login_utilisateur'>Login</label>
				<input name='login_utilisateur' id='login_utilisateur' type='text' class='form-control' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkLogin()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='nom_utilisateur'>Nom</label>
				<input name='nom_utilisateur' id='nom_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_utilisateur'>Prenom</label>
				<input name='prenom_utilisateur' id='prenom_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_utilisateur'>Adresse</label>
				<input name='adresse_utilisateur' id='adresse_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_utilisateur'>Mail</label>
				<input name='mail_utilisateur' id='mail_utilisateur' type='text' class='form-control' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkMail()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='tel_utilisateur'>Tel</label>
				<input name='tel_utilisateur' id='tel_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_utilisateur'>Code postal</label>
				<input name='code_postal_utilisateur' id='code_postal_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_utilisateur'>Ville</label>
				<input name='ville_utilisateur' id='ville_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='type_utilisateur'>Type d'utilisateur</label></br>
				<select class='form-control' name='type_utilisateur'>
				<?php
					foreach ($types as $type)
					{
						echo "<option value='".$type['id']."'>".$type['libelle']."</option>";
					}
				?>
				</select>
				</br>
				
				<label for='mdp_utilisateur'>MDP</label>
				<input name='mdp_utilisateur' id='mdp_utilisateur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				confirmer MDP
				<input name='mdp_utilisateur2' id='mdp_utilisateur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
</div>