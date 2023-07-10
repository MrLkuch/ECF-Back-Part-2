<?php

$dsn = "mysql:host=localhost;dbname=nom_de_la_base_de_donnees";
$user = "nom_d'utilisateur";
$pass = "mot_de_passe";
$db = new PDO($dsn, $user, $pass);

// Requête pour récupérer la liste complète des emprunteurs, triée par ordre alphabétique de nom et prénom
$requete1 = "SELECT * FROM emprunteur ORDER BY nom, prenom;";
$quer1 = $pdo->query($requete1);
$res1 = $quer1->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les données de l'emprunteur qui est relié au user dont l'id est 3
$requete2 = "SELECT * FROM emprunteur WHERE user_id = 3;";
$quer2 = $pdo->query($requete2);
$res2 = $quer2->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer la liste des emprunteurs dont le nom ou le prénom contient le mot clé 'foo', triée par ordre alphabétique de nom et prénom
$requete3 = "SELECT * FROM emprunteur WHERE nom LIKE '%foo%' OR prenom LIKE '%foo%' ORDER BY nom, prenom;";
$quer3 = $pdo->query($requete3);
$res3 = $quer3->fetchAll(PDO::FETCH_ASSOC);

?>