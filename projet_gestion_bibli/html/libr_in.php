<?php
session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';



$affiche=recherche_unique("document","code_doc",$_GET['x']);


$d=$_GET['x'];

if(isset($_GET['x']) )
  {

    $per=$_SESSION["mat_pers"];

$person=recherche_unique("personne","mat_pers",$per);

    $codedoc=$affiche['code_doc'];
    $pergrpcode=$person['GROUPE_code_grp'];
    $datesortie=date('Y-m-d');
    
  
    $requete="INSERT INTO `emprunter`(`PERSONNE_mat_pers`, `PERSONNE_GROUPE_code_grp`, `DOCUMENT_code_doc`, `date_sortie`, `date_retour`) value('$per', '$pergrpcode','$codedoc','$datesortie','0000-00-00');";
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array());

	
    
    

  }

?>

<!DOCTYPE html>
<html>
<head>
<style>
    .emprunter:hover{
background-color:rgb(62, 133, 240);
    }
</style>
</head>
<body style=" background-color:rgb(166, 167, 164);">

<table border="0" cellspacing="0" cellpadding="23" width="400px" style="margin-left:33%;background-color:grey;border-radius:80px">
  <tr>
    <th align="left">
<label for="user">pseudo</label> </th><td>
<input type="text" name="user" id="user"/>
    </td>
  </tr>

  <tr>
    <th>
      <label for="date_sortie">date de sortie</label></th><td>
        <input type="date" name="date_sortie" id="date_sortie"/>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="valider" style="width:300px;height:35px;margin-left:30px" />
    </td>
  </tr>
</table>

</body>
</html>