<?php


$strr="ballo ibrahim bibli";

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

echo mot_de_passe($strr);

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

echo pseudo_crypt($strr);
?>