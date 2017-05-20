<?php
	$categories = $pdo->get_categ();
	
	if (!isset($_REQUEST['categ']))
	{
		$produits = $pdo->get_produit(0);
	}
	
	else
	{
		$produits = $pdo->get_produit($_REQUEST['categ']);
	}
	include('vues/v_voirProduitsProducteur.php');
	
?>
