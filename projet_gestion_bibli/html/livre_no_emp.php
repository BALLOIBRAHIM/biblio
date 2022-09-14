<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');


    
   
$req="SELECT * FROM emprunter ";
$prep=$cd->prepare($req);
$execute=$prep->execute();
$affi=$prep->FETCH(PDO::FETCH_ASSOC);



$i=0;
$tab_emp_doc=array();



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
            $tab_emp_doc[]=$code_doc;
            $affiche_doc=recherche_unique("document","code_doc",$code_doc);
    
    ?>

<?php 
 } while($affi=$prep->FETCH(PDO::FETCH_ASSOC));

 ?>

<?php do{ 
    if(in_array($affiche['code_doc'],$tab_emp_doc)){}
    else{
    ?>
<span style="float:left;">
    

<figure>
<img src="<?php echo $affiche['image_doc'];?>"  style="width:230px;height:250px;margin-left:50px;padding-top:40px;"/>
</figure>
<figcaption><div  style="margin-left:40px;width:150px;height:130px">
<p > code : <?php echo $affiche['code_doc'];?></P>
<p> titre : <?php echo $affiche['titre_doc'];?></P>
<p> description : <?php echo $affiche['descr_doc'];?></P>
</div>
</figcaption>

</span>
<?php }}while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
</body>
</html>