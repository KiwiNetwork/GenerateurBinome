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
    
    function tabrand()
    {
        $i=0;
        while($i<15)
        {
            $nrandom=  rand(0, 14);
            while (in_array($nrandom, $random)) //Boucle vérifiant si l'entier est deja présent dans le tableau. Si true, relance un rand.
            {
                $nrandom= rand(0,14);
            } 
        }
    }
    
    //Boucle créant un tableau de 15 entier aléatoire.
    $random=array();
    $random1=array();
    
    if(empty($random))
    {
        tabrand();
    }
    else
    {
        for($i=0;$i<15;$i++)
        {
            $random1[$i] = $random[$i];
        }
        tabrand();
        $x=0;
        $y=0;
        while($x<15)
        {
            while($y<15)
            {
                if(random[$x]==random1[$y] OR random[$x]==random1[$y+1] AND random[$x+1]==random1[$y+1] OR random[$x+1]==random1[$y+1]) 
                {
                    tabrand();
                }
                $y=$y+2;
            }
            $x=$x+2;
        }
    }
    //Récupération et stockage des prénoms stocker dans la liste de données.
    $j=0;
    $nombinome = $bdd->query('SELECT prenom FROM liste ORDER BY ID DESC');
    while ($resultat = $nombinome->fetch())
    {
        $nombinome1[$j] = $resultat['prenom'];
        $j++;
    }
    
    //Boucle d'affichage des prénoms.
    $l=0;
    while($l<16)
    {
        echo $nombinome1[$random[$l]] . ' : ' . $nombinome1[$random[$l+1]] . '</br>';
        $l=$l+2;
    }
    
?>