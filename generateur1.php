<!DOCTYPE html>

<?php

    // Connection à la base de donnée.
    try
    {
        $bdd=new PDO('mysql:host=localhost;dbname=generateurbinome;charset=utf8','root','');
    }
    catch (Exception $e) 
    {
        die('Erreur'.$e ->getMessage());
    }
    
    $random=array();
    $i=0;
    while($i<15) //Boucle créant un tableau de 15 entier aléatoire.
    {
        $nrandom=  rand(0, 14);
        while (in_array($nrandom, $random)) //Boucle vérifiant si l'entier est deja présent dans le tableau. Si true, relance un rand.
        {
            $nrandom= rand(0,14);
        }
        $random[$i]=$nrandom;
        $i++;
    }
    
    
    //Récupération et stockage dans un tableau des prénoms stocker dans la bdd.
    $j=0;
    $nombinome = $bdd->query('SELECT prenom FROM liste ORDER BY ID DESC');
    while ($resultat = $nombinome->fetch())
    {
        $nombinome1[$j] = $resultat['prenom'];
        $j++;
    }
    
    //Boucle d'affichage des prénoms et de création de binome.
    $l=0;
    while($l<16)
    {
        echo $nombinome1[$random[$l]] . ' : ' . $nombinome1[$random[$l+1]] . '</br>';
        $l=$l+2;
    }            
?>

<html>
    <form action="generateur1.php">
        <input type="submit" value="Générer"/>
    </form>
</html>