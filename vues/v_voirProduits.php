<div class="container">
	<div class="row">
			<div class="sidebar-nav col-sm-2 col-12">
				<div class="navbar navbar-default" role="navigation">
					<ul class="nav navbar-nav">
					
					<?php
					foreach($categories as $categorie)
					{
						echo "<li>
								<a href='index.php?uc=voirProduits&categ=".$categorie['id']."'>".$categorie['libelle']."</a>
							 </li>";
					}
					?>
					
					</ul>
				</div>
			  
				<?php
					echo "<div class='well well-sm'><p>".count($produits)." produit(s)</p></div>";
				?>
			</div>
			
		  <div class="col-sm-10 col-xs-12">
			<?php
				
				
				foreach($produits as $cle => $produit)
				{
					
				echo "<div class='col-12 col-sm-10 well'>
						
							<div class='row'>
								<div class='well well-sm' id='libelle_produit".$produit['id']."'>".$produit['libelle']."
								</div>
							</div>
							
							<div class='row'>
								<div class='col-12'>
									<div class='col-12 col-sm-6 col-md-4 well well-sm'>
										<img class='imageproduit img-rounded' src= 'img/produits/".mb_strtolower($produit['libelle']).".jpg' alt='' />
									</div>
								
									<div class='col-12 col-sm-6 col-md-8 well well-sm' id='description_produit".$produit['id']."'>Description:<br/>".$produit['description']."</div>
								</div>
							</div>
					
							<div class='row'>";
								
								if (isset($_SESSION['id_Type_utilisateur']) && $_SESSION['id_Type_utilisateur'] == 2)
								{
									echo "<div class='col-12 well'>
											<div class='col-sm-6' id='pu_produit".$produit['id']."'>Prix au kilo:".$produit['prixunitaire']." euros.
											</div>
											
											<div class='col-sm-6' id='quantite_produit".$produit['id']."'>".$produit['quantite']." kilogramme(s)
											</div>
										</div>";
								}
								else
								{
									echo "<div class='col-12 col-sm-6 well well-sm'>
											<form method='post' action='index.php?uc=gestionPanier&action=ajouter&imageProduit=".$produit['image']."&idProduit=".$produit['id']."&libelleProduit=".$produit['libelle']."&descriptionProduit=".$produit['description']."&prixProduit=".$produit['prixunitaire']."'>
												<input type='number' value=1 id='qte_produit' class='form-control input-sm' name='qte_produit' min='1'>
												<input type='submit' id='button_produit".$produit['id']."' class='form-control input-sm' value='Ajouter au panier'></input>
											</form>
										</div>";
										
									echo "<div class='col-12 col-sm-6 well'>
											<div class='col-sm-6' id='pu_produit".$produit['id']."'>Prix au kilo:".$produit['prixunitaire']." euros.
											</div>
											
											<div class='col-sm-6' id='quantite_produit".$produit['id']."'>".$produit['quantite']." kilogramme(s)</div></div>
											</div>
										</div>";
								}
									
								echo "
							</div>
					</div>";
					
				}
			
			?>
			
		  </div>
	</div>
</div>