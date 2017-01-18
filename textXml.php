<?php

include_once('util/connexion_sql.php');
global $bdd;   

$xml='<livraisons>';

$req = $bdd->prepare('SELECT * FROM livraison ');
$req->execute();
$livraisons = $req->fetchAll();

//pour chaque livraisons
foreach($livraisons as $livraison)
{
	//recupere son client
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE id='.$livraison['id_utilisateur']);
	$req->execute();
	
	$util = $req->fetch();
	
	$xml = $xml.'<livraison><client>'.$util['nom'].'</client><adresse>'.$util['adresse'].' '.$util['codepostal'].' '.$util['ville'].'</adresse>';

	//recupere tous ses colis
	$req = $bdd->prepare('SELECT * FROM colis WHERE id_livraison ='.$livraison['id']);
	$req->execute();
	$lesColis = $req->fetchAll();
	
	foreach($lesColis as $colis)
	{
		$xml = $xml.'<colis><ref>'.$colis['ref'].'</ref><montant>'.$colis['montanttotal'].'</montant></colis>';
		
	}
	$xml = $xml.'</livraison>';
}

$xml = $xml.'</livraisons>';

var_dump($xml);

file_put_contents('xml/livraisons.xml', $xml);

