<?php
// Connexion bdd
try
{$bdd = new PDO('mysql:host=localhost;dbname=amap', 'root', '');}
catch(Exception $e)
{die('Erreur : '.$e->getMessage());}