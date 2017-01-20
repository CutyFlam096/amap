<?php
include_once("connexion_sql.php");

function get_categ() //Donne les categorie de produit a afficher dans le nav
{
    global $bdd;
    $req = $bdd->prepare('SELECT id, libelle FROM categorie ORDER BY libelle');
    $req->execute();
    $categories = $req->fetchAll();
    return $categories;
}

function get_produit($uneCateg) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$uneCateg = (int) $uneCateg;

	if($uneCateg==0)
	{$req = 'SELECT * FROM produit ORDER BY libelle';}

	else
	{$req = "SELECT * FROM produit WHERE produit.id_categorie = '".$uneCateg."' ORDER BY libelle";}
	$req = $bdd->prepare($req);
    $req->execute();
    $produits = $req->fetchAll();

    return $produits;
}

function verifQteProduit($libelle, $qte)
{
	global $bdd;
	$req = "SELECT * FROM produit WHERE libelle = '".$libelle."'";
	$req = $bdd->prepare($req);
	$req -> execute();
	$produit = $req->fetch();
	if ($qte > $produit['quantite'])
	{
		return false;
	}
	else
	{
		return true;
	}

}

function get_produitProducteur($unId) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$unId = (int) $unId;

	$req = "SELECT * FROM produit WHERE produit.id_utilisateur = '".$unId."' ORDER BY libelle";
	$req = $bdd->prepare($req);
    $req->execute();
    $produits = $req->fetchAll();

    return $produits;
}

function set_param_compte($id, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $login, $newMdp)
{
	global $bdd;
	$req = $bdd->prepare('UPDATE utilisateur
						SET nom= :nom,
						prenom= :prenom,
						adresse= :adresse,
						mail= :mail,
						tel= :tel,
						codepostal= :codepostal,
						ville= :ville,
						mdp= :mdp,
						login= :login
						WHERE id= :id');

	$req->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'adresse' => $adresse,
		'mail' => $mail,
		'tel' => $tel,
		'codepostal' => $cp,
		'ville' => $ville,
		'mdp' => $newMdp,
		'login' => $login,
		'id' => $id
	));

	$_SESSION['id'] = $id;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['adresse'] = $adresse;
	$_SESSION['mail'] = $mail;
	$_SESSION['tel'] = $tel;
	$_SESSION['codepostal'] = $cp;
	$_SESSION['ville'] = $ville;
	$_SESSION['mdp'] = $newMdp;
	$_SESSION['login'] = $login;

	return true;
}

function set_connexion($unLogin, $unMdp)//fait la connexion en consommateur, producteur ou admib
{
    global $bdd;
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE login= :login AND mdp = :mdp');

	$req->execute(array(
	'login' => $unLogin,
	'mdp' => $unMdp
	));

    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

	$MonMembreExiste = $req->rowCount();

	if ($MonMembreExiste == 0)
	{
		//si pas de compte
		return false;
	}
    else
	{
		//si ok
		$_SESSION['id'] = $utilisateur['id'];
		$_SESSION['nom'] = $utilisateur['nom'];
		$_SESSION['prenom'] = $utilisateur['prenom'];
		$_SESSION['adresse'] = $utilisateur['adresse'];
		$_SESSION['mail'] = $utilisateur['mail'];
		$_SESSION['tel'] = $utilisateur['tel'];
		$_SESSION['codepostal'] = $utilisateur['codepostal'];
		$_SESSION['ville'] = $utilisateur['ville'];
		$_SESSION['mdp'] = $utilisateur['mdp'];
		$_SESSION['login'] = $utilisateur['login'];
		$_SESSION['id_Type_utilisateur'] = $utilisateur['id_Type_utilisateur'];
		return true;
	}
}

function verifierCompteExistant($login, $mail)
	{
		global $bdd;
		$req = $bdd->prepare("SELECT login, mail FROM utilisateur WHERE login=:login OR mail=:mail");

		$req->execute(array(
			'login' => $login,
			'mail' => $mail
			));

		$existant=false;

		if ( $req->fetch() )
		{
			$existant = true;
		}

		return $existant;
	}


function set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $mdp, $type)//creer un compte
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, adresse, mail, tel, codepostal, ville, mdp, login, id_Type_utilisateur)
							  Value(:nom, :prenom, :adresse, :mail, :tel, :codePostal, :ville, :mdp, :login, :type)");
		$req->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'adresse' => $adresse,
		'mail' => $mail,
		'tel' => $tel,
		'codePostal' => $codePostal,
		'ville' => $ville,
		'mdp' => $mdp,
		'login' => $login,
		'type' => $type));
}

function creerArticleBD($description, $prix, $idCategorie)
{
	$req = $bdd->prepare("INSERT INTO produit(description, prix, idCategorie)
	VALUES(:description, :prix, :idCategorie)");

	$req->execute(array(
		'description' => $description,
		'prix' => $prix,
		'idCategorie' => $idCategorie
		));
}

function creationPanier()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier']=array();
      $_SESSION['panier']['idProduit'] = array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['descriptionProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
   }
   return true;
}

function ajouterArticle($idProduit,$libelleProduit,$descriptionProduit,$qteProduit,$prixProduit){

   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
		 array_push( $_SESSION['panier']['idProduit'],$idProduit);
		 array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['descriptionProduit'],$descriptionProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
	  $tmp['idProduit'] = array();
      $tmp['libelleProduit'] = array();
	  $tmp['descriptionProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();

      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
			array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
			array_push( $tmp['descriptionProduit'],$_SESSION['panier']['descriptionProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function MontantGlobal()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;

}

function supprimePanier()
{
   unset($_SESSION['panier']);
}

function nouvLivraison($unIdUtil)
{
	global $bdd;
	$req = $bdd->exec("INSERT INTO livraison ('id_utilisateur') VALUES (".$unIdUtil.")");

	var_dump($req);
	var_dump($bdd->lastInsertId());
	return $bdd->lastInsertId();
}

function nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit)
{
	global $bdd;
	$req = $bdd->prepare("INSERT INTO colis ('montanttotal','id_livraison','quantite','id_produit') VALUES (:montant, :idLiv, :qte, :idProd)");

	$req->execute(array(
		'montant' => $montantTotal,
		'idLiv' => $idLivraison,
		'qte' => $quantiteProd,
		'idProd' => $idProduit
		)
	);

	return true;
}
