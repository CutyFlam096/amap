<div class="container">
	<div class="row">				
		<?php
		foreach($utilisateurs as $util)
		{
			echo "<div class='col-xs-12 well'>
					<form>
						<button id='".$util['id']."' type='button' data-toggle='modal' data-target='#myModal' class='btn btn-modal btn-default btn-sm'>
							<span class='glyphicon glyphicon-remove-circle'></span>
						</button>
					</form>
					<form method='POST' action='' class='form-group'>
						<label for='id_util'>Id:</label>
						<input name='id_util' id='id_util' type='text' class='form-control' value='".$util['id']."'>
						
						<label for='nom_util'>Nom:</label>
						<input name='nom_util' id='nom_util' type='text' class='form-control' value='".$util['nom']."'>
						
						<label for='prenom_util'>Prenom:</label>
						<input name='prenom_util' id='prenom_util' type='text' class='form-control' value='".$util['prenom']."'>
						
						<label for='adresse_util'>Adresse:</label>
						<input name='adresse_util' id='adresse_util' type='text' class='form-control' value='".$util['adresse']."'>
						
						<label for='mail_util'>Mail:</label>
						<input name='mail_util' id='mail_util' type='text' class='form-control' value='".$util['mail']."'>
						
						<label for='tel_util'>Tel:</label>
						<input name='tel_util' id='tel_util' type='text' class='form-control' value='".$util['tel']."'>
						
						<label for='cp_util'>CP:</label>
						<input name='cp_util' id='cp_util' type='text' class='form-control' value='".$util['codepostal']."'>
						
						<label for='ville_util'>Ville:</label>
						<input name='ville_util' id='ville_util' type='text' class='form-control' value='".$util['ville']."'>
						
						<label for='login_util'>Login:</label>
						<input name='login_util' id='login_util' type='text' class='form-control' value='".$util['ville']."'>
						
						<label for='type_utilisateur'>Type d'utilisateur</label></br>
						<select class='form-control' name='type_utilisateur'>";
						
							foreach ($types as $type)
							{
								if ($type['id'] == $util['id_Type_utilisateur'])
								{echo "<option value='".$type['id']."' selected >".$type['libelle']."</option>";}
								else
								{echo "<option value='".$type['id']."'>".$type['libelle']."</option>";}
							}
						
					echo "</select>
					</form>
				 </div>";
		}
		?>
		
		<form method='POST' action='index.php?uc=gererCompteUtilisateur&action=ajouter'>
			<button type='submit' class='btn btn-default btn-sm'>
				<span class='glyphicon glyphicon-remove-circle'></span>Ajouter un utilisateur
			</button>
		</form>
		
		<div class='modal fade' id='myModal' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-body'>
						<p>
							Êtes-vous sûr de vouloir supprimer définitivement cet utilisateur?
						</p>
						<form method='POST' action='index.php?uc=gererCompteUtilisateur&action=supprimer'>
							<input type='hidden' name='idUtil' class='id_produit_del'/>
							<input class='btn btn-default btn-danger' type='submit' value='Oui' />
						</form>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Non</button>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>