<?php
$action = $_REQUEST['action'];
if (isset($_SESSION['id']))//si connecté
{
	if (count($_SESSION['panier']['libelleProduit']) == 0)
	{
		include('vues/v_erreurPanierVide.php');
	}
	else
	{
		switch($action)
		{
			case 'choisirDate' :
			{
				include('vues/v_calendrier.php');
				break;
			}
			case 'passerCommande' :
			{
				$date_livraison=$_REQUEST['date_livraison'];
				$client = $_SESSION['nom']." ".$_SESSION['prenom'];
				$adresse = $_SESSION['adresse'].", ".$_SESSION['codepostal']." ".$_SESSION['ville'];
				
				$testProduits = true;
				//pour chaque produit, verifier si sa qte est <= a celle en bdd
				for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']) && $testProduits==true; $i++)
				{
					$libelle = $_SESSION['panier']['libelleProduit'][$i];
					$qte = $_SESSION['panier']['qteProduit'][$i];
					
					$testProduits = $pdo->verifQteProduit($libelle, $qte);
				}
				
				if ($testProduits == true)//si tous les produits OK
				{
					$idLivraison = $pdo->nouvLivraison($_SESSION['id'], $date_livraison);//creer la nouvelle livraison et recupere son id
					
					$nbArticles = $pdo->compterArticles();
					for ($i=0 ;$i < $nbArticles ; $i++)//pour chaque article du panier
					{
						$montantTotal = $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
						$quantiteProd = $_SESSION['panier']['qteProduit'][$i];
						$idProduit = $_SESSION['panier']['idProduit'][$i];
						
						$pdo->nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit);
					}
					include('vues/v_resumeCommande.php');
					$pdo->supprimePanier();//vide le panier
				}
				else
				{
					echo "erreur quantite produit!";
					echo $testProduits;
				}
				
				break;
			}
		}
	}
}
else
{
	include('vues/v_erreurConnexionCommande.php');
}