<div class="container">
	<div class="row">
		  <div class="col-sm-2">
			<div class="sidebar-nav">
			  <div class="navbar navbar-default" role="navigation">
				<div class="navbar-collapse collapse sidebar-navbar-collapse">
				  <ul class="nav navbar-nav">
					
					<?php
						foreach($categories as $categorie)
						{
							echo "<li><a href='index.php?uc=voirProduits&categ=".$categorie['id']."'>".$categorie['libelle']."</a></li>";
						}
					?>
					
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</div>
		  </div>
		  <div class="col-sm-9">
			<?php
				echo "<p>".count($produits)." produit(s)</p>";
				
				foreach($produits as $cle => $produit)
				{
					
						echo "<div class='col-lg-10 unProduit'>";
								echo "<div class='row'>";
								
								echo "<div class='col-lg-6' id='libelle_produit".$produit['id']."'>".$produit['libelle']."</div>";
									
								echo "<div class='col-lg-6'>";
									echo "<img class='imageproduit' src= 'img/produits/".mb_strtolower($produit['libelle']).".jpg' alt='' />";
								echo "</div>";
									
								echo "<div class='col-lg-6' id='description_produit".$produit['id']."'>Description:<br/>".$produit['description']."</div>";
								
								echo "<div class='col-lg-4'>
										<form method='post' action='index.php?uc=gestionPanier&action=ajouter&idProduit=".$produit['id']."&libelleProduit=".$produit['libelle']."&descriptionProduit=".$produit['description']."&prixProduit=".$produit['prixunitaire']."'>
											<input type='number' value=1 id='qte_produit' class='form-control' name='qte_produit' min='1'>
											<input type='submit' id='button_produit".$produit['id']."' class='form-control' value='Ajouter au panier'></input>
										</form>
									</div>";
									
								echo "<div class='col-lg-4' id='pu_produit".$produit['id']."'>Prix au kilo : ".$produit['prixunitaire']." euro(s).</div>";
								echo "<div class='col-lg-4' id='quantite_produit".$produit['id']."'>".$produit['quantite']." kilogramme(s)</div>";
							echo "</div>";
						echo "</div>";
					
				}
			
			?>
			
		  </div>
	</div>
</div>