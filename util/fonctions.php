<?php
class AMAP
{
  	private static $serveur='mysql:host=localhost';
  	private static $bdd='dbname=amap';
  	private static $user='root' ;
  	private static $mdp='' ;
	private static $monPdo;
	private static $monAMAP = null;
		
	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */
	private function __construct()
	{
    		AMAP::$monPdo = new PDO(AMAP::$serveur.';'.AMAP::$bdd, AMAP::$user, AMAP::$mdp);
			AMAP::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct()
	{
		AMAP::$monPdo = null;
	}

	/**
	 * Fonction statique qui crée l'unique instance de la classe
	 *
	 * Appel : $instanceAMAP = AMAP::getAMAP();
	 * @return l'unique objet de la classe AMAP
	 */
	public static function getAMAP()
	{
		if(AMAP::$monAMAP == null)
		{
			AMAP::$monAMAP= new AMAP();
		}
		return AMAP::$monAMAP;
	}

	public function get_categ() //Donne les categorie de produit a afficher dans le nav
	{
	    $req = AMAP::$monPdo->prepare('SELECT id, libelle FROM categorie ORDER BY libelle');
	    $req->execute();
	    $categories = $req->fetchAll();
	    return $categories;
	}

	public function get_produit($uneCateg) //donne tous les produit ou seulement ceux d'une categ
	{
	    $uneCateg = (int) $uneCateg;

		if($uneCateg==0)
		{$req = 'SELECT * FROM produit ORDER BY libelle';}

		else
		{$req = "SELECT * FROM produit WHERE produit.id_categorie = '".$uneCateg."' ORDER BY libelle";}
		$req = AMAP::$monPdo->prepare($req);
	    $req->execute();
	    $produits = $req->fetchAll();

	    return $produits;
	}

	public function verifQteProduit($libelle, $qte)
	{
		$req = "SELECT * FROM produit WHERE libelle = '".$libelle."'";
		$req = AMAP::$monPdo->prepare($req);
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

	public function get_produitProducteur($unId) //donne tous les produit ou seulement ceux d'une categ
	{
	    $unId = (int) $unId;

		$req = "SELECT * FROM produit WHERE produit.id_utilisateur = '".$unId."' ORDER BY libelle";
		$req = AMAP::$monPdo->prepare($req);
	    $req->execute();
	    $produits = $req->fetchAll();

	    return $produits;
	}

	public function set_param_compte($id, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $login, $newMdp)
	{
		$req = AMAP::$monPdo->prepare('UPDATE utilisateur
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

	public function set_connexion($unLogin, $unMdp)//fait la connexion en consommateur, producteur ou admib
	{
	    $req = AMAP::$monPdo->prepare('SELECT * FROM utilisateur WHERE login= :login AND mdp = :mdp');

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

	public function verifierCompteExistant($login, $mail)
	{
		$req = AMAP::$monPdo->prepare("SELECT login, mail FROM utilisateur WHERE login=:login OR mail=:mail");

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


	public function set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $mdp, $type)//creer un compte
	{
	    $req = AMAP::$monPdo->prepare("INSERT INTO utilisateur(nom, prenom, adresse, mail, tel, codepostal, ville, mdp, login, id_Type_utilisateur)
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

	public function creerArticleBD($description, $prix, $idCategorie)
	{
		$req = AMAP::$monPdo->prepare("INSERT INTO produit(description, prix, idCategorie)
		VALUES(:description, :prix, :idCategorie)");

		$req->execute(array(
			'description' => $description,
			'prix' => $prix,
			'idCategorie' => $idCategorie
			));
	}

	public function creationPanier()
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

	public function ajouterArticle($idProduit,$libelleProduit,$descriptionProduit,$qteProduit,$prixProduit)
	{
	   //Si le panier existe
	   if (AMAP::creationPanier())
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

	public function supprimerArticle($libelleProduit)
	{
	   //Si le panier existe
	   if (amap::creationPanier())
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

	public function modifierQTeArticle($libelleProduit,$qteProduit)
	{
	   //Si le panier éxiste
	   if (amap::creationPanier())
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

	public function MontantGlobal()
	{
	   $total=0;
	   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
	   {
	      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
	   }
	   return $total;
	}

	public function compterArticles()
	{
	   if (isset($_SESSION['panier']))
	   return count($_SESSION['panier']['libelleProduit']);
	   else
	   return 0;

	}

	public function supprimePanier()
	{
	   unset($_SESSION['panier']);
	}

	public function nouvLivraison($unIdUtil)
	{
		/**
		$req = AMAP::$monPdo->exec("INSERT INTO livraison ('id_utilisateur') VALUES (".$unIdUtil.")");

		var_dump($req);
		var_dump($bdd->lastInsertId());
		return $bdd->lastInsertId();
		**/
	}

	public function nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit)
	{
		/**
		$req = AMAP::$monPdo->prepare("INSERT INTO colis ('montanttotal','id_livraison','quantite','id_produit') VALUES (:montant, :idLiv, :qte, :idProd)");

		$req->execute(array(
			'montant' => $montantTotal,
			'idLiv' => $idLivraison,
			'qte' => $quantiteProd,
			'idProd' => $idProduit
			)
		);
		**/

		return true;
	}
}
?>