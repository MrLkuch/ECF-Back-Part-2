<?php
$dsn = "mysql:host=localhost;dbname=nom_de_la_base_de_donnees";
$user = "nom_d'utilisateur";
$pass = "mot_de_passe";
$db = new PDO($dsn, $user, $pass);

// Lecture des emprunts
$requete1 = "SELECT * FROM emprunt ORDER BY date_emprunt DESC LIMIT 3";
$quer1 = $db->query($requete1);
$res1 = $quer1->fetchAll(PDO::FETCH_ASSOC);

$requete2 = "SELECT * FROM emprunt WHERE id_emprunteur = 2 ORDER BY date_emprunt ASC";
$quer2 = $db->query($requete2);
$res2 = $quer2->fetchAll(PDO::FETCH_ASSOC);

$requete3 = "SELECT * FROM emprunt WHERE id_livre = 3 ORDER BY date_emprunt DESC";
$quer3 = $db->query($requete3);
$res3 = $quer3->fetchAll(PDO::FETCH_ASSOC);

$requete4 = "SELECT * FROM emprunt WHERE date_retour IS NULL ORDER BY date_emprunt ASC";
$quer4 = $db->query($requete4);
$res4 = $quer4->fetchAll(PDO::FETCH_ASSOC);

print_r($res1);
print_r($res2);
print_r($res3);
print_r($res4);

// Création et de mise à jour des emprunts
$quer5 = "INSERT INTO emprunt (date_emprunt, date_retour, id_emprunteur, id_livre)
           VALUES ('2020-12-01 16:00:00', NULL, 1, 1)";
$db->query($quer5);

$quer6 = "UPDATE emprunt SET date_retour = '2020-05-01 10:00:00' WHERE id_emprunt = 3";
$db->query($quer6);
?>




