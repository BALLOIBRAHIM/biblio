<?php

$cnx=new PDO('mysql:host=localhost;dbname=file_attente','root',"");

    $va=$_GET['x'];
    
    $delete=$cnx->prepare("DELETE FROM `agent` WHERE `agent`.`code_agent` = '$va' ");
    $delete->execute();

  header("Location: agent.php");


?>