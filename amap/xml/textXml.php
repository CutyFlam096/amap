<?php
	include_once('../util/fonctions.php');
	$pdo = AMAP::getAMAP();
	header("Content-type: text/xml"); //indique qu'on va renvoyer du xml
	print('<?xml version="1.0" encoding="utf-8"?>');
		$xml='<livraisons>';
		$lesLivraisons = $pdo->getLivraisonDuJour();
		//pour chaque livraisons
		foreach($lesLivraisons as $livraison)
		{
			$util = $pdo->getUtil($livraison['id_utilisateur']);
			$xml = $xml.'<livraison><client>'.$util['nom'].'</client><adresse>'.$util['adresse'].' '.$util['codepostal'].' '.$util['ville'].'</adresse>';
			//recupere tous ses colis
			$lesColis = $pdo->getColis($livraison['id']);
			foreach($lesColis as $colis)
			{
				$xml = $xml.'<colis><ref>'.$colis['ref'].'</ref><montant>'.$colis['montanttotal'].'</montant></colis>';
			}

			$xml = $xml.'</livraison>';
		}
		echo $xml.'</livraisons>';
?>