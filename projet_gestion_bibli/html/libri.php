<?php
session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';



$affiche=recherche_unique("document","code_doc",$_GET['x']);


$d=$_GET['x'];

if(isset($_GET['x']) and isset($_SESSION["mat_pers"]))
  {

    $per=$_SESSION["mat_pers"];

$person=recherche_unique("personne","mat_pers",$per);

    $codedoc=$affiche['code_doc'];
    $pergrpcode=$person['GROUPE_code_grp'];
    $datesortie=date('Y-m-d');
    
    $requete="UPDATE `emprunter` SET `date_sortie` = '$dateretour',`date_retour` = '0000-00-00' WHERE `emprunter`.`PERSONNE_mat_pers` = '$per' AND `emprunter`.`PERSONNE_GROUPE_code_grp` = '$pergrpcode' AND `emprunter`.`DOCUMENT_code_doc` = '$codedoc';";
  
    
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array());

	header("location: gestion_emprunts.php?mat_pers=".$_SESSION['mat_pers']);
    
    

  }

?>