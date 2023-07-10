--Utilisateur

SELECT * FROM `user` ORDER BY `email` ASC;

SELECT * FROM `user` WHERE `id` = 1;

SELECT * FROM `user` WHERE `roles` LIKE '%ROLE_USER%' ORDER BY `email` ASC;

--Livre

--Lecture

SELECT * FROM livre ORDER BY titre ASC;

SELECT * FROM livre WHERE id = 1;

SELECT * FROM livre WHERE titre LIKE '%lorem%' ORDER BY titre ASC;

--Création 

INSERT INTO livre (titre, annee_edition, nombre_pages, code_isbn, auteur_id)
VALUES ('Totum autem id externum', 2020, 300, '9790412882714', 2);

--Mise à jour

UPDATE livre SET titre = 'Aperiendum est igitur' WHERE id = 2;

--Suppression

DELETE FROM livre WHERE id = 123;

--Les emprunteurs

SELECT * FROM emprunteur ORDER BY nom, prenom;

SELECT * FROM emprunteur WHERE user_id = 3;

SELECT * FROM emprunteur WHERE nom LIKE '%foo%' OR prenom LIKE '%foo%' ORDER BY nom, prenom;

--Les emprunts

--Lecture

SELECT * FROM emprunt ORDER BY date_emprunt DESC LIMIT 3;

SELECT * FROM emprunt WHERE id_emprunteur = 2 ORDER BY date_emprunt;

SELECT * FROM emprunt WHERE id_livre = 3 ORDER BY date_emprunt DESC;

SELECT * FROM emprunt WHERE date_retour IS NULL ORDER BY date_emprunt;

--Création

INSERT INTO emprunt (date_emprunt, date_retour, id_emprunteur, id_livre) 
VALUES ('2020-12-01 16:00:00', NULL, 1, 1);

--Mise à jour

UPDATE emprunt SET date_retour = '2020-05-01 10:00:00' WHERE id = 3;