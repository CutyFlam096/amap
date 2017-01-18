<?php
	/**
	$livraison = array(
	"client" => "Fouque patrice",
	"adresse" => "172 rue de la boustifaille"
	
	"colis" => array(
		"montantGlobal" => "256421",
		"libelle" => array(),
		"quantite" => array()
		)
	)
	**/
	
	//1 colis par livraison avec tous les produits dedans finaleùment :D
	//si connectée
	if (isset($_SESSION['id']))
	{
		//si panier vide
		if (count($_SESSION['panier']['libelleProduit']) <= 0)
		{
			echo "panier vide";
		}
		else
		{
			$livraison = array(
			"client" => $_SESSION['nom']." ".$_SESSION['prenom'],
			"adresse" => $_SESSION['adresse']." ".$_SESSION['codepostal']." ".$_SESSION['ville']
			
			"colis" => array(
				"montantGlobal" => "0",
				"libelle" => array(),
				"quantite" => array()
				)
			)
		
			$testProduits = true;
			//pour chaque produit, verifier si sa qte est <= a celle en bdd
			for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']) && $testProduits==true; $i++)
			{
				$libelle = $_SESSION['panier']['libelleProduit'][$i];
				$qte = $_SESSION['panier']['qteProduit'][$i];
				
				$testProduits = verifQteProduit($libelle, $qte);
			}
			
			if ($testProduits == true)//si tous les produits OK
			{
				$poid_panier = PoidGlobal();//recupere le poids de tous els produits
				
				if ($poid_panier <= 25)//on fait juste 1 colis
				{
					//$laLivraison['colis']['ref'] = array(); fais automatiquement en BDD
					$laLivraison['colis']['montant'] = MontantGlobal();
					
					echo $laLivraison['colis']['montant'];
					
					$laLivraison['colis']['produits'] = array();
					$laLivraison['colis']['produits']['libelle'] = array();
					$laLivraison['colis']['produits']['qte'] = array();
						
					for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']); $i++)
					{
						$libelle = $_SESSION['panier']['libelleProduit'][$i];
						$qte = $_SESSION['panier']['qteProduit'][$i];
						
						array_push( $laLivraison['colis']['produits']['libelle'], $libelle);
						array_push( $laLivraison['colis']['produits']['qte'], $qte);
					}
					//TEST OK
				}
				else//si plus de 25 produits
				{
					$laLivraison['colis']['produits'] = array();
					$laLivraison['colis']['produits']['libelle'] = array();
					$laLivraison['colis']['produits']['qte'] = array();

					$placeProduits=25;
					
					for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']); $i++)
					{
						$libelle = $_SESSION['panier']['libelleProduit'][$i];
						$qte = $_SESSION['panier']['qteProduit'][$i];
						
						if ($qte<placeProduits)
						{
							
						}
						
						
						//array_push( $laLivraison['colis']['produits']['libelle'], $libelle);
						//array_push( $laLivraison['colis']['produits']['qte'], $qte);
					}
					
					echo "> 25";
				}
				
				//separer en colis tous les 25kg
				
				//parcourir tous le panier
					//creer un colis
					//au bout de 25, creer un autre colis si il reste encore des produits LOOOOOOOOOOOOOOOOOOOOOOOL
		
				
						
			}
			else
			{
				echo "erreur de tes morts!";
				//erreur qte produit
				echo $testProduits;
			}
		}
		
	}
	else
	{
		//echo "pas co :(";
	}