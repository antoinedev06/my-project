<?php

include "application/bdd_connection.php";

$query = $pdo->prepare(
'INSERT INTO Comment (Post_Id, NickName, Contents, CreationTimestamp)
VALUES (?,?,? NOW())'
)

$complus = $query ->execute([$_POST['Post_Id'], $_POST['NickName'], $_POST['Contents'], $_POST['CreationTimestamp']]);


 header('Location: show_post.php');
  exit();

  $template ='admin';
include 'layout.phtml';