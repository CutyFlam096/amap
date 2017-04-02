<div class='container'>
<p>Ajout Produit</p>

<div class='form-group'>
		<form method='POST' action='index.php?uc=gererProduit&action=ajouterArticle' enctype="multipart/form-data">
				<label for='libelle_produit'>libelle</label>
				<input name='libelle_produit' id='libelle_produit' type='text' class='form-control'/>
				
				<label for='description_produit'>description</label>
				<textarea name='description_produit' id='description_produit' class='form-control'></textarea>
				
				<label for='pu_produit'>Prix unitaire</label>
				<input name='pu_produit' id='pu_produit' type='number'  step="0.01" class='form-control'/>
				
				<label for='quantite_produit'>Quantite</label>
				<input name='quantite_produit' id='quantite_produit' type='number' class='form-control'/>
				
				<label for='categorie_produit'>Categorie</label>
				<select name='categorie_produit' class="form-control" >
				<?php
					foreach($categories as $categorie)
					{
						echo "<option value=".$categorie['id']." >".$categorie['libelle']."</option>";
					}
				?>
				</select>
				
				<label for='image_produit'>image</label></br>
				<span class="btn btn-default btn-file">
					<input type="file" name='image_produit' id='image_produit'/>
				</span></br></br>
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
		</form>
    </div>
</div>