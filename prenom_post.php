<?php
    try{
        $bdd=new PDO('mysql:host=localhost;dbname=generateurbinome;charset=utf8','root','');
    } catch (Exception $e) {
        die('Erreur'.$e ->getMessage());
    }

    $req = $bdd ->prepare('INSERT INTO liste (prenom) VALUES(?)');
    $req ->execute(array($_POST['prenom']));  
    header('Location: index.php');
    
?>