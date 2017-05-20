
<div class='container'>
	<div class='col-xs-12'>
		<div class='col-xs-12'>
			<p>Choisissez une date de livraison : </p>
		</div>
		<form method='POST' action='index.php?uc=commande&action=passerCommande'>
			
			<div class='col-xs-12 col-sm-8 col-md-4'>
				<label for='datepicker'>Date : </label>
				<input type="date" id="datepicker" name='date_livraison' class='form-control'  onblur="verifDateLivraison()">
				</br>
			</div>
			<div class='col-xs-12'>
				<input type="submit" class='btn btn-primary' onclick="return checkSubmitDateLivraison()">
			</div>
		</form>
	</div>
</div>