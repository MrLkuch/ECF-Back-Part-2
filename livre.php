<?php
$dsn = "mysql:host=localhost;dbname=nom_de_la_base_de_donnees";
$user = "nom_d'utilisateur";
$pass = "mot_de_passe";
$db = new PDO($dsn, $user, $pass);

// Lecture
// la liste complète de tous les livres, triée par ordre alphabétique de titre
$stmt = $dbh->prepare('SELECT * FROM livre ORDER BY titre ASC');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// les données du livre dont l'id est `1`
$stmt = $dbh->prepare('SELECT * FROM livre WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = 1;
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// la liste des livres dont le titre contient le mot clé `lorem`, triée par ordre alphabétique de titre
$stmt = $dbh->prepare('SELECT * FROM livre WHERE titre LIKE :titre ORDER BY titre ASC');
$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
$titre = '%lorem%';
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Création
// ajouter un nouveau livre
//   - titre : Totum autem id externum
//   - année d'édition : 2020
//   - nombre de pages : 300
//   - code ISBN : 9790412882714
//   - auteur : Hugues Cartier (id `2`)
$stmt = $dbh->prepare('INSERT INTO livre (titre, annee_edition, nombre_pages, code_isbn, auteur_id) VALUES (:titre, :annee_edition, :nombre_pages, :code_isbn, :auteur_id)');
$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
$stmt->bindParam(':annee_edition', $annee_edition, PDO::PARAM_INT);
$stmt->bindParam(':nombre_pages', $nombre_pages, PDO::PARAM_INT);
$stmt->bindParam(':code_isbn', $code_isbn, PDO::PARAM_STR);
$stmt->bindParam(':auteur_id', $auteur_id, PDO::PARAM_INT);
$titre = 'Totum autem id externum';
$annee_edition = 2020;
$nombre_pages = 300;
$code_isbn = '9790412882714';
$auteur_id = 2;
$stmt->execute();

// Mise à jour
// modifier le livre dont l'id est `2`
//   - titre : Aperiendum est igitur
$stmt = $dbh->prepare('UPDATE livre SET titre = :titre WHERE id = :id');
$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$titre = 'Aperiendum est igitur';
$id = 2;
$stmt->execute();

// Suppression
// supprimer le livre dont l'id est `123`
$stmt = $dbh->prepare('DELETE FROM livre WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = 123;
$stmt->execute();
?>