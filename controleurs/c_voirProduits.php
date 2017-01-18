<?php
	$categories = get_categ();
	
	if (!isset($_REQUEST['categ']))
	{
		$produits = get_produit(0);
	}
	
	else
	{
		$produits = get_produit($_REQUEST['categ']);
	}
	include('vues/v_voirProduits.php');
	
?>
