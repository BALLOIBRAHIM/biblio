<?php
session_start();

require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';

if(empty($_SESSION['mat_pers'])){
header("HTTP/1.0 404 Not Found");
exit();
}
if(isset($_GET['mat_pers']) ){
  
  $person=recherche_unique("personne","mat_pers",$_GET['mat_pers']);

  $_SESSION['mat_pers']=$person['mat_pers'];
  $_SESSION['nom_pers']=$person['nom_pers'];
  $_SESSION['prenom_pers']=$person['prenom_pers'];
}

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

}


$tab_user_doc=array();


if(isset($_POST['mod_profil']))
{
  header("location: modif_pers.php?mat_pers=".$_SESSION['mat_pers']);

}
$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
$dossier_genre=$affiche_gen['dossier'];
    switch($_GET['y']){
        case "informatique":
        $regexrech='/\.\.\/images\/informatique\//i';
        break;
        case "politique":
        $regexrech='/\.\.\/images\/politique\//i';
        break;
        case "conte":
        $regexrech='/\.\.\/images\/conte\//i';
        break;
        case "amour":
        $regexrech='/\.\.\/images\/amour\//i';
        break;
        case "sport":
        $regexrech='/\.\.\/images\/sport\//i';
        break;
        case "finance":
        $regexrech='/\.\.\/images\/finance\//i';
        break;
        case "mangement":
        $regexrech='/\.\.\/images\/mangement\//i';
        break;
        case "plus_de_genres":
        $regexrech='/\.\.\/images\//i';
        break;
        
    }

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title> les livres du genre</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/index.css">
<style>
  ul li a{
    width: 155px;
  }

  h1,h2,h4,p{
    color:white;
  }
  .profil{
    float: right;
     height: 200px;
     width: 400px;
     margin-top: 20px;
     background-color:black;
     text-align:center;

  }
   .vertical-line{
    border-left: 2px solid rgb(93, 183, 206);
    display: inline-block;
    height: 70px;
    margin: 0 20px;
  }
  .g:hover{
    background-color: rgb(93, 97, 89);
}
</style>
</head>
<body >

<div class="inde" >
    <span style="width: 100px; height: 80px; clear: both; float: left; margin-left: 10px;margin-top: -130px; color: aliceblue;" ></span>  
	<div class="imag_top">
    <img src="../images/LIB-BIBLI.jpg" style="width: 80PX; height: 80PX;clear: both;float: left;margin-left:-280px">
    <aside style="color: white;clear: both;float: left;; margin-left: -200px; margin-top: -60px; width: 100px;height: 100px; padding-left: 15px;">
      une bibliothèque pour tous </aside>
<table border="0" width="400px" height="45px" >
 <tr> 
  
  <td align="center"><img src="../images/logo-facebook.png" width="50px" height="50px"/></td>
  <td align="center"><img src="../images/twitter.png" width="60px" height="50px"/></td>
  <td align="center"><img src="../images/whatsapp.png" width="50px" height="50px"/></td>
  <td align="center"><img src="../images/e-mail.png" width="50px" height="50px"/></td>
</tr>
</table>
  </div>
  <div class="btn-connecter" style="

 width: 160px;
 height: 40px;
 float: right;
 
 margin-right: 70px;
 margin-top: -69px;
 padding-top: 30px;
 padding-left: 30px;
 " > 
  <a href="modif_pers.php? mat_pers=<?php echo$_SESSION['mat_pers'];?>">

 <input type="submit" name="mod_profil" value="modifier mon profil" style=" height: 40px;width: 160px;"/> 
 
 </a>
    

    </div>
<div class="btn-connecter"> 
 
 <a href="deconnexion.php">
  <input type="submit" name="se deconnecter" value=" se deconnecter" style=" height: 40px;width: 160px;"/>
  </a>  
  
    </div>
   
    </div>
    <div class="imag_center" style="background-color: black;">
    <!-- IMAGE apres le head-->
    
    <span class="profil" style="">  

    <div class="slideshow-container" style="margin-top:20px;">

  <!-- Full-width images with number and caption text -->
  
  <div class="mySlides fade">
    <div class="numbertext">
    <img src="../images/Welcome.jpg" style="width: 200px;heigth: 200px;">

    </div>
   
    <div class="text"> <h1><?php  echo $_SESSION['mat_pers'];?></h1> </div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="../images/user.png" style="width: 100px;heigth: 100px;">
    
    <div class="text">
      <h2><?php  echo $_SESSION['nom_pers'];?></h2>
      <h4><?php echo $_SESSION['prenom_pers'];?></h4>
    </div>
  </div>

  <div class="mySlides fade" >
    <div class="numbertext">

    <img src="../images/savoir.jfif" style="width: 180px;heigth: 200px;">
    </div>
    
    
    <div class="text"> <h2> trouver l'impossible</h2>
                        
  </div>
  </div>

  

 
  
</div>
  
  </span>
    <img src="../images/inscrie1.jfif" style="float: right; height: 200px;width: 400px; margin-top: 20px;"/>
    <img src="../images/inscrie.jfif" style="float: right; height: 200px;width: 400px; margin-top: 20px;"/>
   

   </div>
    <div class="inde" style="margin-top: -2px; width:" >
      <ul> 
      <li><a href="index_user.php? mat_pers=<?php echo $_SESSION['mat_pers']?>" style="font-size: large;">Accueil</a></li>
      
      <li><a href="gestion_emprunts.php? mat_pers=<?php echo $_SESSION['mat_pers']?>" style="font-size: large;">gestion emprunts</a></li>
      <li><a href="emprunter.php? mat_pers=<?php echo $_SESSION['mat_pers']?>" style="font-size: large;width:190px">les genres disponibles</a></li>

        </ul>
     
        <div style="width: 330px; 
        height: 40px; 
        background-color:rgb(7, 7, 7);
         clear: both;
          float:right;
          margin-top: -50px;
          padding-top: 10px;
          padding-right: 50px;
          padding-bottom: 10px;

          ">
   
          <img src="../images/chercher.png" 
          style="clear: both;float: left;;width: 45px;height: 45px; margin-left: 10px;margin-top: 1px; padding-left: 10px;padding-right: 10px;"/>
          <input type="text" name="recherche" placeholder="taper votre recherche ici" style="width: 230px; height: 35px;" />
         
        </div>
        </div>




   


<!-- Slideshow container -->



<!-- The dots/circles -->
<div style="text-align:center;clear: both;" >
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>


<div  style="
      clear: both;
     float: right;
    
      width: 1200px;
      height: 1300px;
      background-color:rgb(166, 167, 164);
      margin-top: 10px;
      margin-right: 29px;
"
>
<span class="baniere" style="margin-top: 20px;">
  
   <p style="text-align: center;font-size:xx-large;margin-top: 10px;">Les livres du genre <?php echo$_GET['y'];?> </p>
 
</span>
<span class="baniere" style="margin-top: 20px;background-color:rgb(166, 167, 164); height: 350px;">
  
</span>
  
          
          <!--les livre disponibles -->
          <span class="baniere" style="margin-top: -300px;background-color:rgb(166, 167, 164); height: 650px;overflow:scroll;">
          
          <?php do {  $code_doc=$affi['DOCUMENT_code_doc'];
            $tab_user_doc[]=$code_doc;
            $affiche_doc=recherche_unique("document","code_doc",$code_doc);
    
    ?>

<?php 
 } while($affi=$prep->FETCH(PDO::FETCH_ASSOC)) ?>

<?php do{ 
    
    if(in_array($affiche['code_doc'],$tab_user_doc)){}
    else{
        if(preg_match($regexrech,$affiche['image_doc'])){
       
    ?>
<span style="float:left;">
    

<figure>
<img src="<?php echo $affiche['image_doc'];?>"  style="width:180px;height:250px;padding-left:-20px;padding-top:40px;"/>
</figure><a href="libr.php?  x=<?php echo $affiche['code_doc'];?> " >
<figcaption><input type="submit" class="emprunter" value="emprunter" style="margin-left:60px;border-radius:10px"/></figcaption>
</a>
</span>
<?php }}}while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
            </span>
          <span style="width: 1200px; height: 330px;overflow:scroll;">
            
          </span>

  <span class="baniere"><p style="text-align: center;font-size:xx-large;margin-top: 10px;">Les nouveautés </p></span>
    
  <span style="width: 1200px; height: 330px;">
           
     
    <p>
      <marquee BEHAVIOR="alternate" scrolldelay="700">
        <img src="../images/autre/96_victor_hugo_au.jfif" class="img_aside"/>
        <img src="../images/autre/android_au.jfif" class="img_aside"/>
        <img src="../images/autre/homme_au.jfif" class="img_aside"/>
        <img src="../images/autre/html_css_js_au.jfif" class="img_aside"/>
        <img src="../images/autre/java_c_au.jfif" class="img_aside"/>
        
        
        
        <img src="../images/autre/musique2_au.png" class="img_aside"/>
       
        <img src="../images/autre/nu_au.jfif" class="img_aside"/>
        <img src="../images/autre/on_se_chamaille_au.jfif" class="img_aside"/>
        <img src="../images/autre/oracle_au.jfif" class="img_aside"/>
        
        
      </marquee>
    </p>


  </span>

           


<!-- The dots/circles -->
<div style="text-align:center;clear: both;" >
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>


<!--<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
-->
<footer>
  <div class="inde" style="margin-left: -1px;">
    <div class="imag_top" style="margin-left: 250px;">
  <table border="0" width="700px" height="45px" >
   <tr> 
    
    <td align="center"><img src="../images/logo-facebook.png" width="50px" height="50px"/></td>
    <td align="center"><img src="../images/twitter.png" width="60px" height="50px"/></td>
    <td align="center"><img src="../images/whatsapp.png" width="50px" height="50px"/></td>
    <td align="center"><img src="../images/e-mail.png" width="50px" height="50px"/></td>
    <td align="center"><img src="../images/linkedin.png" width="50px" height="50px"/></td>
    <td align="center"><img src="../images/github.png" width="50px" height="50px"/></td>
  </tr>
  </table>
    </div>
 
    <p style="clear: both; float: left;margin-left: 410px; margin-top: 120px; color: white;">
      Copyright © 2021 Lib-Bibli Tous droits réservés.</p> 
      <span style="width: 100px; height: 80px; clear: both; float: left; margin-left: 10px;margin-top: -150px;" ><img src="../images/LIB-BIBLI.jpg" style="width: 100PX; height: 100PX;"></span>  
       <div style="clear: both; float: left; margin-top: -140px; margin-left: 270px; color: white; "> 
     
 
IUA <n>    
<span class="vertical-line"></span>
Institut Universitaire Abidjan
    <span class="vertical-line"></span>
   Lib-bibli
    <span class="vertical-line"></span>
    une bibliothèque libre
    <span class="vertical-line"></span>
  pour tous
  </div>
</footer>

</body>
</html>