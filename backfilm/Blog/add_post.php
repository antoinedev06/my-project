<?php

include "application/bdd_connection.php";
if(!empty($_POST)){
	$query = $pdo->prepare('
	INSERT INTO Post (Title, Contents, Author_Id, Category_Id,  CreationTimestamp)
	VALUES (?, ?, ?, ?, NOW());

	');

	$query->execute([$_POST['Title'], $_POST['Contents'], $_POST['Category_Id'], $_POST['Author_Id']]);

	$post = $query->fetch();
	header('location: add_post.php');
	exit();
}
else{
$template ='admin';
include 'layout.phtml';
}


