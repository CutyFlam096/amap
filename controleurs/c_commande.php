<?php
$action = $_REQUEST['action'];
if (isset($_SESSION['id']))//si connecté
{
	if (count($_SESSION['panier']['libelleProduit']) == 0)
	{
		echo "panier vide";
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
				
				echo $date_livraison."</br>";
				echo $client."</br>";
				echo $adresse."</br>";
				
				$testProduits = true;
				//pour chaque produit, verifier si sa qte est <= a celle en bdd
				for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']) && $testProduits==true; $i++)
				{
					$libelle = $_SESSION['panier']['libelleProduit'][$i];
					$qte = $_SESSION['panier']['qteProduit'][$i];
					
					echo $libelle." ";
					echo $qte."</br>";
					
					$testProduits = $pdo->verifQteProduit($libelle, $qte);
				}
				
				if ($testProduits == true)//si tous les produits OK
				{
					
					$idLivraison = $pdo->nouvLivraison($_SESSION['id'], $date_livraison);//creer la nouvelle livraison et recupere son id
					echo "Creation livraison OK </br>";
					
					$nbArticles = $pdo->compterArticles();
					echo "Creation article OK </br>";
					for ($i=0 ;$i < $nbArticles ; $i++)//pour chaque article du panier
					{
						$montantTotal = $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
						$quantiteProd = $_SESSION['panier']['qteProduit'][$i];
						$idProduit = $_SESSION['panier']['idProduit'][$i];
						
						$pdo->nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit);
					}
					
					$pdo->supprimePanier();
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
	//echo "pas co :(";
}