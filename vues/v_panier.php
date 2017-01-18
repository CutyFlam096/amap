<div class='container'>
	<table class="table table-bordered">
		

		<?php
		if (creationPanier())
		{
			$nbArticles=count($_SESSION['panier']['libelleProduit']);
			if ($nbArticles <= 0)
			echo "<tr><td colspan='6'>Votre panier est vide </ td></tr>";
			else
			{
				echo "
				<tr>
					<td colspan='6'>Votre panier</td>
				</tr>
		
				<tr>
					<td>Image</td>
					<td>Libellé</td>
					<td>Description</td>
					<td>Quantité</td>
					<td>Prix Unitaire</td>
					<td>Action</td> <!--bouton supprimer-->
				</tr>";
		
				for ($i=0 ;$i < $nbArticles ; $i++)
				{
					echo "<tr>";
					
					echo "<td>
							<img class='imageproduit' src= 'img/produits/".mb_strtolower($_SESSION['panier']['libelleProduit'][$i]).".jpg' alt='' />
						</td>";
					
					echo "<td>".$_SESSION['panier']['libelleProduit'][$i]."</ td>";
					
					echo "<td>".$_SESSION['panier']['descriptionProduit'][$i]."</td>";
					
					echo "<td>
								<form method='post' action='index.php?uc=gestionPanier&action=modifier&libelleProduit=".$_SESSION['panier']['libelleProduit'][$i]."'>
									<input class='form-control' type='number' size='4' name='quantiteProd' value='".$_SESSION['panier']['qteProduit'][$i]."'></br>
									<input class='form-control' type='submit' value='modifier'>
								</form>
						</td>";
						
					echo "<td>".$_SESSION['panier']['prixProduit'][$i]." euro(s).</td>";
					
					echo "<td>
							<form method='post' action='index.php?uc=gestionPanier&action=supprimer&libelleProduit=".$_SESSION['panier']['libelleProduit'][$i]."'>
								<input class='form-control' type='submit' value='supprimer'>
							</form>";
					echo "</td></tr>";
				}

				echo "<td colspan='3'>";
				echo "Nombre d'article(s) : ".$nbArticles.
				".</br>Total : ".MontantGlobal()." euro(s).";
				echo "</td>";
				
				
				
				echo "<td colspan='3'>
					<form method='post' action='index.php?uc=gestionPanier&action=viderPanier'>
						<input class='form-control' type='submit' value='Vider panier'>
					 </form>
					 <form method='post' action='index.php?uc=passerCommande'>
						<input class='form-control' type='submit' value='Passer commande'>
					 </form>";

				echo "</td></tr>";
				
				
			}
		}
		?>
	</table>
</div>