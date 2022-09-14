<?php
function mot_de_passe($str){

  for($i=1;$i<strlen($str);$i++){
       
       $md5pwd=md5($str.$i)."<br>";
       $md5pwdcryp=crypt($md5pwd,"MD5")."<br>";
       $despwdcryp=crypt($md5pwdcryp,"DES")."<br>";
       $md5pwdcryp1=md5($despwdcryp)."<br>";
      $md5pwdcrypH1=sha1($md5pwdcryp1)."<br>";
  }
  return $md5pwdcrypH1;
  }
  
  
  
  function pseudo_crypt($str){
  
      for($i=1;$i<strlen($str);$i++){
      
          $md5pwd=md5($i.$str.$i)."<br>";
           $md5pwdcryp=crypt($md5pwd,"MD5")."<br>";
           $despwdcryp=crypt($md5pwdcryp,"DES")."<br>";
           $md5pwdcryp1=md5($despwdcryp)."<br>";
           $md5pwdcrypH1=sha1($md5pwdcryp1)."<br>";
      }
      return $md5pwdcrypH1;
      }
  
  
function recherche_unique($db,$col,$val){
    $cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

$requete="SELECT*FROM $db WHERE $col=?";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute(array($val));
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
return $affiche;
}

function recherche_multi($db,$col1,$col2,$val1,$val2){
  $cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

$requete="SELECT*FROM $db WHERE $col1=? and $col2=? ";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute(array($val1,$val2));
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
return $affiche;
}

function delete($db,$col,$val){
     
    $delete=$cd->prepare("DELETE FROM $db WHERE $col = '$val' ");
    $delete->execute();

  header("Location: $db.php");


}
function deconnexion(){
 session_start();
 $_SESSION=array();
 session_destroy();
 header('Location:index.php');
}


?>