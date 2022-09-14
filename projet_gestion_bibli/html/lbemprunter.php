<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

if(isset($_SESSION['mat_pers'])){
    $user=$_SESSION['mat_pers'];
    $recup=recherche_unique("emprunter","PERSONNE_mat_pers",$user);
    
    $code_grp=$recup['PERSONNE_GROUPE_code_grp'];
$req="SELECT * FROM emprunter WHERE emprunter.PERSONNE_mat_pers=? AND emprunter.PERSONNE_GROUPE_code_grp=? AND emprunter.date_retour='0000-00-00';";
$prep=$cd->prepare($req);
$execute=$prep->execute(array($user,$code_grp));
$affi=$prep->FETCH(PDO::FETCH_ASSOC);
$i=0;
$tab_user_doc_emp=array();
}


$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

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

<?php do {  $code_doc=$affi['DOCUMENT_code_doc'];
            $tab_user_doc_emp[]=$code_doc;
            $affiche=recherche_unique("document","code_doc",$code_doc);
    
    ?>
    <span style="float:left;">
    

    <figure>
    <img src="<?php echo $affiche['image_doc'];?>" style="width:180px;height:250px;padding-left:-20px;padding-top:40px;"/>
    </figure><a href="libretour.php?  x=<?php echo $affi['DOCUMENT_code_doc'];?> " >
   
    <figcaption><input type="submit" class="emprunter" value="retourner" style="margin-left:60px;border-radius:10px"/></figcaption>
    </a>
    </span>

<?php 
 } while($affi=$prep->FETCH(PDO::FETCH_ASSOC)) ?>

<?php do{ 
    if(in_array($affiche['code_doc'],$tab_user_doc_emp)){}
    else{
    ?>

<?php }}while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
</body>
</html>