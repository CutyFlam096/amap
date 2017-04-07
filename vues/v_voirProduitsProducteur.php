	<div class="container">
		<div class="row">
			<form method='post' action='index.php?uc=ajout_produit&action=formAjouterArticle'>
				<input type='submit'  class='form-control input-sm' value='Ajouter un produit'></input>
			</form>
			<?php
				echo "<p>".count($produits)." produit(s)</p>";
				
				foreach($produits as $cle => $produit)
				{
					echo "<div class='col-12 well'>
							
								<div class='row'>
									<div class='well well-sm col-sm-1'>
										<form action''>
											<button id='".$produit['id']."' type='button' data-toggle='modal' data-target='#myModal' class='btn btn-modal btn-default btn-sm'>
												<span class='glyphicon glyphicon-remove-circle'></span>
											</button>
										</form>
									</div>
									<div class='well well-sm col-sm-11' id='libelle_produit".$produit['id']."'>".$produit['libelle']."
									</div>
								</div>
								
								<form method='post' action='index.php?uc=modif_produit&action=modifierArticle'>
									<div class='row'>
										<div class='col-12'>
											<div class='col-12 col-sm-6 col-md-4 well well-sm'>
												<img class='imageproduit img-rounded' src= '".mb_strtolower($produit['image'])."' alt='' />
											</div>
										
											<div class='col-12 col-sm-6 col-md-8 well well-sm' id='description_produit".$produit['id']."'>
											Description:<br/>
											<textarea onblur='descriptionProduitModif()' class='form-control' type='hidden' id='description_produit_modif' name='description_produit_modif'>".$produit['description']."</textarea>
											
											</div>
										</div>
									</div>
							
									<div class='row'>
										<div class='col-12 well well-sm'>
											
											<input type='number' onblur='puProduitModif()' value=".$produit['quantite']." id='quantite_produit_modif' class='form-control input-sm' name='quantite_produit_modif' min='1'>
											<input type='number' onblur='qteProduitModif()' step='0.1' value=".$produit['prixunitaire']." id='pu_produit_modif' class='form-control input-sm' name='pu_produit_modif' min='0.1'>
											<input type='hidden' name='id_produit' value='".$produit['id']."'/>
											<input type='submit' onclick='return checkSubmitProduitModif()' class='form-control input-sm' value='Appliquer les modifications'></input>
											
										</div>
									</div>
								</form>
						</div>";
				}

				echo "
					<div class='modal fade' id='myModal' role='dialog'>
						<div class='modal-dialog'>
						  <div class='modal-content'>
							<div class='modal-body'>
								<p>Êtes-vous sûr de vouloir supprimer définitivement ce produit?</p>
								<form method='POST' action='index.php?uc=delete_produit&action=supprimerArticle'>
									<input type='hidden' name='idProduit' class='id_produit_del'/>
									<input class='btn btn-default btn-danger' type='submit' value='Oui' />
								</form>
								<button type='button' class='btn btn-default' data-dismiss='modal'>Non</button>
							</div>
						  </div>
						  
						</div>
				  </div>";
			?>
			</div>
	</div>
</div>