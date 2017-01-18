<form method="POST" action="index.php?uc=ajout&action=ajouterArticle">
	<fieldset>
	<legend>Ajout</legend>
	<p>
		<label for="description">Description</label>
		<input id="description" type="text" name="description" value="" size="30" maxlength="45">
	</p>
	<p>
		<label for="prix">Prix</label>
		<input id="prix" type="text" name="prix" value="" size="30" maxlength="45">
	</p>
	<p>
		<label for="idCategorie">Catégorie</label>
		<select class="reset" name="categorie" id="niveau">
			<option value="com">Composition</option>
		    <option value="fle">Fleur</option>
		    <option value="pla">Plante</option>
		</select>
	</p>
	<p>
		<input type="submit" value="Valider" name="valider">
	</p>
</form>