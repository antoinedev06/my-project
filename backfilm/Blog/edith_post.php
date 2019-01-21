<?php
include "application/bdd_connection.php";
     if(empty($_POST))
    {
        // Validation de la query string dans l'URL.
        if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
        {
            header('Location: index.php');
            exit();
        }
        
$query = $pdo->prepare('SELECT Post.Id, Title, Contents, CreationTimestamp, FirstName, LastName, Name
 	FROM Post
 	INNER JOIN Author ON
 Author.Id = Post.Author_Id
 INNER JOIN Category ON
 Category.Id = Post.Category_Id
 ORDER BY CreationTimestamp DESC
 ')

$query->execute();
$recup = $query->fetch();


$template ='admin';
include 'layout.phtml';