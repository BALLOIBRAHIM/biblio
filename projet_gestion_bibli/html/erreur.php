<?php 
try {
     $cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
      }
      catch (Exception $e) 
      {        die('Erreur : ' . $e->getMessage()); } 
      ?>
