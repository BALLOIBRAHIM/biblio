<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');


    
   
    
    
$req="SELECT * FROM emprunter WHERE emprunter.date_retour !='0000-00-00';";
$prep=$cd->prepare($req);
$execute=$prep->execute(array());
$affi=$prep->FETCH(PDO::FETCH_ASSOC);
$i=0;
$tab_user_doc_emp=array();



$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<style>
    p{
margin-left:65px
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
    <img src="<?php echo $affiche['image_doc'];?>" style="width:170px;height:250px;padding-left:-20px;padding-top:40px;margin-left:60px;"/>
    </figure>
   
    <figcaption>
        <p> user: <?php echo $affi['PERSONNE_mat_pers'];?> </p>
        <p> code_doc: <?php echo $affi['DOCUMENT_code_doc'];?> </p>
        <p> date de retour: <?php echo $affi['date_retour'];?> </p>
    
    </figcaption>

    </span>

<?php 
 } while($affi=$prep->FETCH(PDO::FETCH_ASSOC)) ?>


</body>
</html>