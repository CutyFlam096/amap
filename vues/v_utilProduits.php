
	<div class="container">
		<div class="row">
			<form method='post' action='index.php?uc=gererProduit&action=formAjouterArticle'>
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
								
								<form method='post' action='index.php?uc=gererProduit&action=modifier'>
								<input type='hidden' value=".$produit['id']." id='id_produit' name='id_produit'>
									<div class='row'>
										<div class='col-12'>
											<div class='col-12 col-sm-6 col-md-4 well well-sm'>
												<img class='imageproduit img-rounded' src= '".mb_strtolower($produit['image'])."' alt='' />
											</div>
										
											<div class='col-12 col-sm-6 col-md-8 well well-sm' id='description_produit".$produit['id']."'>
											Description:<br/>
											<textarea class='form-control' type='hidden' name='description_produit'>".$produit['description']."</textarea>
											
											</div>
										</div>
									</div>
							
									<div class='row'>
										<div class='col-12 well well-sm'>
											
											<input type='number' value=".$produit['quantite']." id='quantite_produit' class='form-control input-sm' name='quantite_produit' min='1'>
											<input type='number' step='0.1' value=".$produit['prixunitaire']." id='pu_produit' class='form-control input-sm' name='pu_produit' min='0.1'>
											<input type='hidden' name='id_produit' value='".$produit['id']."'/>
											<input type='submit' class='form-control input-sm' value='Appliquer les modifications'></input>
											
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
								<form method='POST'  action='index.php?uc=gererProduit&action=supprimer'>
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