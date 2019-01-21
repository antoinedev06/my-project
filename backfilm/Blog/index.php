<?php
include "application/bdd_connection.php";

$query = $pdo->prepare('
SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName FROM Post
INNER JOIN Author ON Author.Id = Post.Author_Id
ORDER BY CreationTimestamp
');

$query->execute();

$Article = $query->fetchAll();

$template = 'index';

include 'layout.phtml';