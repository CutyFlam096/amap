<div class="container">
	<div class="row">
					
		<?php
		$cpt = 1;
		foreach($categories as $categorie)
		{
			echo "<div class='col-xs-12 well'>
					<form action''>
						<button id='".$categorie['id']."' type='button' data-toggle='modal' data-target='#myModal' class='btn btn-modal btn-default btn-sm'>
							<span class='glyphicon glyphicon-remove-circle'></span>
						</button>
					</form>
					<p>Catégorie".$cpt.": ".$categorie['libelle']."</p>
				 </div>";
			$cpt = $cpt + 1;
		}
		?>
		
		<div class='col-xs-12'>
			<p>Ajouter une nouvelle categorie</p>
			<form method='POST' action='index.php?uc=gererCategorie&action=ajout'>
				<input type='text' name="nomCateg" class='form-control'>
				<input type='submit' class='btn btn-primary'>
			</form>
		</div>
		
		<div class='modal fade' id='myModal' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-body'>
						<p>
							Êtes-vous sûr de vouloir supprimer définitivement cette catégorie?</br>
							Cela va également supprimer tous les produits de cette catégorie ainsi que les colis contenant ces produits.
						</p>
						<form method='POST' action='index.php?uc=gererCategorie&action=supprimer'>
							<input type='hidden' name='idProduit' class='id_produit_del'/>
							<input class='btn btn-default btn-danger' type='submit' value='Oui' />
						</form>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Non</button>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>