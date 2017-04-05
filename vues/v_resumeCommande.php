<div class='container'>
	
	<?php
	echo "<table class='table table-bordered'>
				<tr>
					<td colspan='6'><div class='titre_commande'>Votre Commande</div></td>
				</tr>
				
				<tr>
					<td colspan='2'>Nom, prenom et adresse</td>
					<td colspan='1'>N° commande</td>
					<td colspan='2'>Date de livraison</td>
				</tr>
				
				<tr>
					<td colspan='2'>
						".$client."</br>".$adresse."
					</td>
					<td colspan='1'>".$idLivraison."</td>
					<td colspan='2'>".$date_livraison."</td>
				</tr>
				
				<tr>
					<td>Image</td>
					<td>Libellé</td>
					<td>Description</td>
					<td>Quantité</td>
					<td>Prix Unitaire</td>
				</tr>";
		
				for ($i=0 ;$i < $nbArticles ; $i++)
				{
					echo "<tr>";
					
					echo "<td>
							<img class='imageproduit' src= '".mb_strtolower($_SESSION['panier']['imageProduit'][$i])."' alt='' />
						</td>";
					
					echo "<td>".$_SESSION['panier']['libelleProduit'][$i]."</ td>";
					
					echo "<td>".$_SESSION['panier']['descriptionProduit'][$i]."</td>";
					
					echo "<td>".$_SESSION['panier']['qteProduit'][$i]."</td>";
						
					echo "<td>".$_SESSION['panier']['prixProduit'][$i]." euro(s).</td>";
					
					echo "</tr>";
				}

				echo "<td colspan='5'>";
				echo "Nombre d'article(s) : ".$nbArticles.
				".</br>Total : ".$pdo->MontantGlobal()." euro(s).";
				echo "</td></tr></table>";
	?>
	
</div>