<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cd->prepare("DELETE FROM `genre` WHERE `genre`.`type` = '$va' ");
    $delete->execute();

  header("Location: document.php");


?>