<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cd->prepare("DELETE FROM `personne` WHERE `personne`.`mat_pers` = '$va' ");
    $delete->execute();

  header("Location: liste_personne.php");


?>