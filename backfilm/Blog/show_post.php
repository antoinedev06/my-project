<?php

include "application/bdd_connection.php";
// Validation de la query string dans l'URL.
if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
    {
        header('Location: index.php');
        exit();
    }
$query = $pdo->prepare(
'SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName FROM Post
INNER JOIN Author ON Author.Id = Post.Author_Id
WHERE Post.Id = ?
');

$query->execute([$_GET['id']]);
$post = $query->fetch();

$query = $pdo->prepare(
'SELECT Id, NickName, Contents, CreationTimestamp FROM Comment
WHERE Post_Id = ?
');


$query->execute([$_GET['id']]);

$commentaire = $query->fetchAll();

$template = 'show_post';

include 'layout.phtml';