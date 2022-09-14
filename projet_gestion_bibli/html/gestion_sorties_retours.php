

<?php
session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';
//declaration des variable
if(isset($_GET['mat_ad'])){

	$person=recherche_unique("administrateur","mat_ad",$_GET['mat_ad']);
  
	$_SESSION['mat_ad']=$person['mat_ad'];
	$_SESSION['nom_ad']=$person['nom_ad'];
	$_SESSION['prenom_ad']=$person['prenom_ad'];
  }
$valide=0;
$mgrpe="";
$mg="";
$memail="";
$mtel="";
$mpseudo="";
$css_class="";
$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

$requete_doc="SELECT*FROM document";
$prepare_doc=$cd->prepare($requete_doc);
$execute_doc=$prepare_doc->execute();
$affiche_doc=$prepare_doc->FETCH(PDO::FETCH_ASSOC);





?>





 <!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8"/>
 <title>gestion des sorties et retours</title>
 <link rel="stylesheet" type="text/css" href="../css/menu.css">
 <link rel="stylesheet" href="../css/css.css">

 <script language="JavaScript" type="text/javascript">
	<!--
	function charge() {
	  document.getElementById('photo_pers').click();
	}
	function tutu() {
	 i =  document.getElementById('photo_pers');
	 i.addEventListener('change',changeValeur,false);
	}
	function changeValeur() {
	 document.getElementById('photo_url').value = this.value;
	 document.getElementById('ima').value = this.value;
	}
	//-->
	</script>
	<style>
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
	</style>
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
 </head>
 <body onload="tutu()" style=" background-color:rgb(166, 167, 164);">

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
<a href="deconnexion.php"><input  class="btn btn-primary" type="submit" name="deconnexion" value="se déconnecter" style="border-radius:10px;margin-left:47px;height:40px;width:170px"/></a>
</div>

<div class="enre">
	<h2 style="margin-left: 170px; color:white"> faire sortir un livre</h2>
	<div style="background-color:grey;height:340px;overflow:scroll" >
		<?php include 'livre_sortie.php'?>
	</div>
</div>
	
<div class="enre" style="margin-left:650px;background-color:rgb(74, 180, 241); margin-top:-400px;">
 <h2 style="margin-left: 125px;color:white;"> faire retourner un livre</h2>
 	<div style="background-color:grey;height:340px;overflow:scroll" >
		
	 	<?php include 'livre_update.php'?>
		
	</div>
</div>

<div class="enre">
	<h2 style="margin-left: 170px; color:white"> Liste des livres sortis</h2>
	<div style="background-color:grey;height:340px;overflow:scroll" >
	 
		<?php include 'livre_emp.php'?>
		
	</div>
</div>

<div class="enre" style="width:620px;background-color: rgb(74, 180, 241);">
	<h2 style="margin-left: 120px; color:white;"> Liste des livres retournés</h2>
	<div style="background-color:grey;height:340px;overflow:scroll" >
	<?php include 'livre_retour.php'?>
	</div>
</div>
</body>
</html>