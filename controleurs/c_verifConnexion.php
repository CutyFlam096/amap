<?php
session_start();
include('../util/fonctions.php');

if (isset($_GET['login_consommateur'])) 
{
  $test_compte = $pdo->set_connexion($_GET['login_consommateur'], $_GET['mdp_consommateur']);
} 
else if (isset($_GET['login_producteur']))
{
  $test_compte = $pdo->set_connexion($_GET['login_producteur'], $_GET['mdp_producteur']);
}



if ( $test_compte )
{
	/**
	echo $_SESSION['nom']."</br>"; 
	echo $_SESSION['prenom']."</br>"; 
	echo $_SESSION['adresse']."</br>"; 
	echo $_SESSION['mail']."</br>"; 
	echo $_SESSION['tel']."</br>"; 
	echo $_SESSION['codepostal']."</br>"; 
	echo $_SESSION['ville']."</br>"; 
	echo $_SESSION['mdp']."</br>"; 
	echo $_SESSION['login']."</br>"; 
	echo $_SESSION['id_Type_utilisateur']."</br>"; 
	**/
	header('Location: ../index.php');    
}
else
{
	echo "Erreur mdp ou pseudo!";
}