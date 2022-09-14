<?php

require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

if(isset($_SESSION['mat_pers'])){
    $user=$_SESSION['mat_pers'];
    $recup=recherche_unique("emprunter","PERSONNE_mat_pers",$user);
    
    $code_grp=$recup['PERSONNE_GROUPE_code_grp'];
   

//les livres de l'user
$requser="SELECT * FROM emprunter WHERE emprunter.PERSONNE_mat_pers=? AND emprunter.PERSONNE_GROUPE_code_grp=?AND emprunter.date_retour!='0000-00-00';";
$prepuser=$cd->prepare($requser);
$execute_user=$prepuser->execute(array($user,$code_grp));
$affi_user=$prepuser->FETCH(PDO::FETCH_ASSOC);


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
<body>




<?php do {  $code_doc=$affi_user['DOCUMENT_code_doc'];
            
            $affiche_retour=recherche_unique("document","code_doc",$code_doc);
    
    ?>
    <span style="float:left;">
    

    <figure>
    <img src="<?php echo $affiche_retour['image_doc'];?>" style="width:180px;height:250px;padding-left:-20px;padding-top:40px;""/>
    </figure><a href="libri.php?  x=<?php echo $affi_user['DOCUMENT_code_doc'];?> " >
   
    <figcaption><input type="submit" class="emprunter" value="re-emprunter" style="margin-left:60px;border-radius:10px"/></figcaption>
    </a>
    </span>
    

<?php 
 } while($affi_user=$prepuser->FETCH(PDO::FETCH_ASSOC)) ?>






</body>
</html>