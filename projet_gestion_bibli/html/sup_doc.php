<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cd->prepare("DELETE FROM `document` WHERE `document`.`code_doc` = '$va' ");
    $delete->execute();

  header("Location: document.php");


?>