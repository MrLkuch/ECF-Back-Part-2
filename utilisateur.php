<?php

$dsn = "mysql:host=localhost;dbname=nom_de_la_base_de_donnees";
$user = "nom_d'utilisateur";
$pass = "mot_de_passe";
$db = new PDO($dsn, $user, $pass);

// Requête 1 
$requete1 = "SELECT * FROM `user` ORDER BY `email` ASC";
$quer1 = $db->query($requete1);
$res1 = $quer1->fetchAll(PDO::FETCH_ASSOC);

// Requête 2 
$requete2 = "SELECT * FROM `user` WHERE `id` = 1";
$quer2 = $db->query($requete2);
$res2 = $quer2->fetchAll(PDO::FETCH_ASSOC);

// Requête 3 
$requete3 = "SELECT * FROM `user` WHERE `roles` LIKE '%ROLE_USER%' ORDER BY `email` ASC";
$quer3 = $db->query($requete3);
$res3 = $quer3->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
print_r($res1);
print_r($res2);
print_r($res3);