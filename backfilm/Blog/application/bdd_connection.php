<?php
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', 'troiswa', [
	    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,// getsions des ereurs
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	    ]);

$pdo->exec('SET NAMES UTF8');

/*Exercice le Blog


Les différents templates; 

*************
* index.php *
*************
	
	- include -> 'bdd_connection';
	- Récuperation de tous les articles du blog par ordre décroissant
	- selection du template :
		$temlpate = 'index';
		include 'layout.phtml';

***************
* index.phtml *
***************

	- Boucle foreach -> liste des articles
	- Liens Hyperlink sur le titre renvoie vers les details de l'article ->show_post

*****************
* show_post.php *
*****************

	- validation de l'url si id <-> key  different ctype_digit redirection index.php
	- include bdd_connetion
	-récupération article
	-récuperation de tous les commentaires de l'article
	- selection et affichage du template : 
		$template = 'show_post';
		include 'layout.phtml'


*******************
* show_post.phtml *
*******************

	- Article : titre, contect (extrait), nom, prenom, date de creation
	- Boucle foreach Liste des commentaires de l'article 
	- Formulaire de saisie d'un nouveau commentaire 
		action = "add_comment.php"
		champ caché pour lier l'Id de article à l'Id du post


*******************
* add_comment.php *
*******************

	- include -> bbd_comment
	- Ajout d'un commentaire à un article -> INSERT INTO
	- Redirection à l'article détaillé une fois que le commentaire est ajouté


*****************
* admin.php *
*****************

	- récupération de tous les articles clasé par ordre décroissant de date de creation
	- selection du template html d'affichage:
		$template ='admin';
		include 'layout.phtml;'


*******************
* admin.phtml *
*******************

	- lien hypertext rédiger un nouvelle article -> add_post.php
	- Boucle foreach :
		- liens hypertext vers postId sur le titre
		- content ...
		- lien hypertext vers edit_post.php Id
		- lien hypertext vers delete_post.php Id


****************
* add_post.php *
****************

	- include -> bbd_comment
	- si vide 
		récupération de toutes les auteurs 
		de toutes les catégories
		selection du template html d'ffigage
			$template = 'add_post';
        	include 'layout.phtml';
    - Sinon Ajout d'un article -> INSERT INTO
    - Redirection index.php

******************
* add_post.phtml *
******************

	- Formulaire de saisie d'un nouvel article action= "add_post.php"


*******************
* delete_post.php *
*******************

	- validation de l'url si id <-> key  different ctype_digit redirection -> index.php

	- suppression de l'article -> DELETE FROM WHERE id= ...



******************
* edith_post.php *
******************

	- include -> bbd_comment
	- validation de l'url si id <-> key  different ctype_digit redirection -> index.php
		récupération d'un article 
		selection du template html d'ffigage
		$template = 'edith_post';
        include 'layout.phtml';
    - sinon Edition d'un article 
    - retour au panneau d'admin : location admin.php


*******************
* edith_post.phtml *
*******************
	-
	<!-- Utilisation d'un champ caché pour spécifier à quel article rattacher le commentaire -->
    <input type="hidden" name="postId" value="<?= intval($post['id']) ?>">

*****************
* layout.phtml *
*****************

	- DOCTYPE, head, meta, link css ...
	- Body : - En tête commune
	- main chargement du template phtml spécifié include $template.'phtml'
*/
