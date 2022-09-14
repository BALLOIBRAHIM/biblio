<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cd->prepare("DELETE FROM `groupe` WHERE `groupe`.`code_grp` = '$va' ");
    $delete->execute();

  header("Location: groupe.php");


?>