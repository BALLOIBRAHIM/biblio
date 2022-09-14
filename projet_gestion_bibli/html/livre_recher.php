<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

if(isset($_SESSION['mat_pers'])){

    $user=$_SESSION['mat_pers'];
    $recup=recherche_unique("emprunter","PERSONNE_mat_pers",$user);
    
    $code_grp=$recup['PERSONNE_GROUPE_code_grp'];
$req="SELECT * FROM emprunter WHERE emprunter.PERSONNE_mat_pers=? AND emprunter.PERSONNE_GROUPE_code_grp=?;";
$prep=$cd->prepare($req);
$execute=$prep->execute(array($user,$code_grp));
$affi=$prep->FETCH(PDO::FETCH_ASSOC);

if($_GET['y']){
    $gen=$_GET['y'];
    $requete_gen="SELECT*FROM genre WHERE genre.type=?";
    $prepare_gen=$cd->prepare($requete_gen);
    $execute_gen=$prepare_gen->execute(array($gen));
    $affiche_gen=$prepare_gen->FETCH(PDO::FETCH_ASSOC);
    var_dump($affiche_gen);
}


$tab_user_doc=array();
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
            $tab_user_doc[]=$code_doc;
            $affiche_doc=recherche_unique("document","code_doc",$code_doc);
    
    ?>

<?php 
 } while($affi=$prep->FETCH(PDO::FETCH_ASSOC)) ?>

<?php do{ 
    if(in_array($affiche['code_doc'],$tab_user_doc)){}
    else{
    ?>
<span style="float:left;">
    

<figure>
<img src="<?php echo $affiche['image_doc'];?>"  style="width:180px;height:250px;padding-left:-20px;padding-top:40px;"/>
</figure><a href="libr.php?  x=<?php echo $affiche['code_doc'];?> " >
<figcaption><input type="submit" class="emprunter" value="emprunter" style="margin-left:60px"/></figcaption>
</a>
</span>
<?php }}while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
</body>
</html>