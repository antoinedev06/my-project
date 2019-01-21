<?php

include "application/bdd_connection.php";

$query = $pdo->prepare('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
 	FROM Post
 	INNER JOIN Author ON
 Author.Id = Post.Author_Id
 INNER JOIN Category ON
 Category.Id = Post.Category_Id
 ORDER BY CreationTimestamp DESC
');

$query->execute();

$listArt = $query->fetch();

$template ='admin';
include 'layout.phtml';
