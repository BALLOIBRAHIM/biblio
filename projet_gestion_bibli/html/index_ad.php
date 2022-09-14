	
  
  <?php

session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';
if(empty($_SESSION['mat_ad'])){
  header("HTTP/1.0 404 Not Found");
  exit();
  }
if(isset($_GET['mat_ad'])){

  $person=recherche_unique("administrateur","mat_ad",$_GET['mat_ad']);

  $_SESSION['mat_ad']=$person['mat_ad'];
  $_SESSION['nom_ad']=$person['nom_ad'];
  $_SESSION['prenom_ad']=$person['prenom_ad'];
}


?>
  
  
  
  <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>Accueil</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">

<style>
 

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
	.ipt{
	width: 250px;
	height:25px ;
}
.btn_gpr {
 width: 100px;
 height: 25px;
 margin-left: 0px;
}
.menu{
		background-color:rgb(166, 167, 164);
		margin-top:100px;
		width: 700px;
		margin-right: 280px;
	}
	 
	ul li a:hover{

text-decoration: none;
}
.enre{
	width:600px;
	height:400px;
	float:left;
	margin-left:20px;
	background-color:rgb(110, 223, 129);
	margin-top:80px;
}

.baniere{
    clear: both;
    float: left;
    width: 1200px;
    height: 50px;
    margin-top: 50px;
	margin-left:20px;
    background-color: rgb(95, 102, 107);

}
.ind_aside_g{
    float: left;
    margin-left: 40px;
    margin-top: 30px;
    width: 250px;
    height: 150px;
    color: white;
    font-size: x-large;
    background-color: rgb(243, 227, 227);
    border-radius: 10PX;
 }
	</style>
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
</head>
<body style="background-color:rgb(166, 167, 164);">
<img src="../images/LIB-BIBLI.jpg"  style="width:100px;height:100px;float:left;margin-left:80px;margin-top:15px;border-radius:100px"/>
<p style="clear:both;flaot:flet;margin-left:40px;margin-bottom:-1100px">  une bibliothèque pour tous </p>






   <div class="menu" >
	<ul> 
	<li><a href="index_ad.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">Accueil</a></li>
		<li><a href="">configurations</a>
			<ul>
		    <li><a href="groupe.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">gestion des groupes</a></li>
		    <li><a href="document.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">gestion des documents</a></li>
		    
		</ul>
	</li>
	<li><a href="">  personnes</a>
		<ul>
			<li><a href="inscription.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">  s'inscrire</a></li>
			<li><a href="liste_personne.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">liste des inscris</a></li>
			
		</ul>
	</li>    
	<li><a href=""> emprunts</a>
		<ul>
			<li><a href="gestion_sorties_retours.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">gestion des sorties et retours</a></li>
			
			<li><a href="liste_doc_yes.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">liste des documents non empreinté</a></li>
			
		</ul>
	</li>
	

</ul></div>
<div style="width:260px;height:150px;border-radius:60px;;clear:both;float:right;margin-top:-190px">

<a href="modif_ad.php? x=<?php echo $_SESSION['mat_ad']?>"><input class="btn btn-primary" type="submit" name="modifier" value="modifier mon profil" style="border-radius:10px;margin-left:47px;margin-bottom:30px;margin-top:40px;height:40px;width:170px"/>
<a href="deconnexion.php">><input  class="btn btn-primary" type="submit" name="deconnexion" value="se déconnecter" style="border-radius:10px;margin-left:47px;height:40px;width:170px"/></a>
</div>
<span class="baniere"><p style="text-align: center;font-size:xx-large;">dashboard -> tableau de bord</p></span>
          


<!-- Slideshow container -->



   
      <span class="baniere" style="margin-top: 20px;background-color:rgb(166, 167, 164); height: 350px;">
        
      <a href="groupe.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
      <aside class="ind_aside_g G1 g" style="background-color: rgb(93, 97, 89);;"> 
        <img src="../images/travail-en-equipe.png" style=" width: 250px; height: 150px;"/>  
        <p style="margin-top:-40px;">gérer les groupes</p>
          
        </aside>
      </a>
        <a href="inscription.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
      <aside class="ind_aside_g G2 g" style="background-color:rgb(87, 220, 243);"> 
      <img src="../images/ajout_personne.png" style=" width: 230px; height: 150px;"/>  
        <p style="margin-top:-80px;"></p>
        <p style="margin-top:-10px;">utilisateur</p>
        <p style="margin-top:-25px;">administrateur</p>
        
      </aside></a>
      <a href="liste_personne.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>"><aside class="  ind_aside_g G3 g" style="background-color:rgb(219, 121, 109);">
      <img src="../images/liste-de-controle.png" style=" width: 230px; height: 150px;"/>  
        <p style="margin-top:-80px;"></p>
        <p style="margin-top:-10px;color:black">utilisateur</p>
        <p style="margin-top:-25px;">administrateur</p>
      </aside></a>
      <aside class="  ind_aside_g G4 g " style="background-color:rgb(4, 209, 192);">
      <img src="../images/utilisateur.png" style=" width: 230px; height: 140px;"/>  
        <p style="margin-top:-29px;"> mon profil</p>
        
      </aside>
      <a href="document.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
      <aside class="  ind_aside_g G5 g "  style="background-color:rgb(238, 99, 238);">
      <img src="../images/gestion-des-dossiers.png" style=" width: 230px; height: 140px;"/>  
        <p style="margin-top:-29px;"> gérer les documents</p>
        
      
      </aside>
        </a>
        <a href="liste_doc_yes.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
      <aside class="  ind_aside_g G6 g " style="background-color:rgb(233, 152, 215);">
      <img src="../images/liste.png" style=" width: 230px; height: 140px;"/>  
        <p style="margin-top:-40px;font-size:large"> liste des documents non emprunter</p>
  
      </aside>
    </a>
    <a href="gestion_sorties_retours.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
  <aside class="  ind_aside_g G7 g " style="background-color:rgb(68, 114, 214);">
  <img src="../images/systeme-de-gestion-de-contenu.png" style=" width: 230px; height: 140px;"/>  
        <p style="margin-top:-40px;font-size:large"> gestion des sorties et retours des documents</p>
  
  </aside>
</a>
<a href="document.php? mat_ad=<?php echo$_SESSION['mat_ad'];?>">
  <aside class="  ind_aside_g G8 g " style="background-color:black;">
  <img src="../images/cercle.png" style=" width: 230px; height: 140px;"/>  
        <p style="margin-top:-60px;">les genres de documents</p>
   

   </aside>
</a>
</span>
  
<span class="baniere"><p style="text-align: center;font-size:xx-large;"></p></span>
  

<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <h1><?php echo $_SESSION['nom_ad'];?></h1>
    <div class="text"></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <h1><?php echo $_SESSION['prenom_ad'];?></h1>
    <div class="text"></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"> div 3</div>
    
    <div class="text"></div>
  </div>

 
  
</div>



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

</body>
</html>