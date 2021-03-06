<?php
session_start();
  
include_once('util/fonctions.php');
$pdo = AMAP::getAMAP();

$categories = $pdo->get_categ();

include_once('vues/v_entete.php');//entete pour toutes les pages
include_once('vues/v_bandeau.php');//donne un menu different si on est connecté

if(!isset($_REQUEST['uc']))
{$uc = 'accueil';}   
else
{$uc = $_REQUEST['uc'];}
	
switch($uc)
{
	case 'accueil' :
		{include("vues/v_accueil.php");break;}
	case 'voirProduits' :
		{include("controleurs/c_voirProduits.php");break;}
	case 'gestionPanier' :
		{include("controleurs/c_gestionPanier.php");break;}
		
	case 'connexionProducteur' :
		{include("controleurs/c_connexionProducteur.php");break;}
	case 'connexionConsommateur' :
		{include("controleurs/c_connexionConsommateur.php");break;}
		
	case 'infosCompte' :
		{include("controleurs/c_infosCompte.php");break;}
	case 'voirProduitsProducteur' :
		{include("controleurs/c_voirProduitsProducteur.php");break;}
	case 'deco' :
		{include("controleurs/c_deconnection.php");break;}
	case 'infoCompte' :
		{include("controleurs/c_infosCompte.php");break;}
	case 'commande' :
		{include("controleurs/c_commande.php");break;}
	case 'ajout_produit' :
		{include("controleurs/c_gestionProduits.php");break;}
	case 'delete_produit' :
		{include("controleurs/c_gestionProduits.php");break;}
	case 'modif_produit' :
		{include("controleurs/c_gestionProduits.php");break;}
	
	case 'gererCategorie' :
		{include("controleurs/c_gestionCategorie.php");break;}
	case 'gererProduit' :
		{include("controleurs/c_gestionProduitAdmin.php");break;}
	case 'gererCompteUtilisateur' :
		{include("controleurs/c_gestionUtilisateur.php");break;}
}

include("vues/v_pied.php") ;
?>