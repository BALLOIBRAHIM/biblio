
<?php
session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';

if(isset($_GET['mat_ad'])){

	$person=recherche_unique("administrateur","mat_ad",$_GET['mat_ad']);
  
	$_SESSION['mat_ad']=$person['mat_ad'];
	$_SESSION['nom_ad']=$person['nom_ad'];
	$_SESSION['prenom_ad']=$person['prenom_ad'];
  }

$requete="SELECT*FROM personne";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

$requete_ad="SELECT*FROM administrateur";
$prepare_ad=$cd->prepare($requete_ad);
$execute_ad=$prepare_ad->execute();
$affiche_ad=$prepare_ad->FETCH(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>liste des inscris</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
  <style>
  
  ul li a:hover{

	text-decoration: none;
}
.menu{
		background-color:rgb(166, 167, 164);
		margin-top:100px;
		width: 700px;
		margin-right: 280px;
	}
</style>
</head>
<body style=" background-color:rgb(166, 167, 164);" >

<img src="../images/LIB-BIBLI.jpg"  style="width:100px;height:100px;float:left;margin-left:80px;margin-top:15px;border-radius:100px"/>
<p style="clear:both;flaot:flet;margin-left:40px;margin-bottom:-100px">  une bibliothèque pour tous </p>


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

<div style="width:260px;height:150px;border-radius:60px;;clear:both;float:right;margin-top:-230px">

<a href="modif_ad.php? x=<?php echo $_SESSION['mat_ad']?>"><input class="btn btn-primary" type="submit" name="modifier" value="modifier mon profil" style="border-radius:10px;margin-left:47px;margin-bottom:30px;margin-top:40px;height:40px;width:170px"/>
<a href="deconnexion.php"><input  class="btn btn-primary" type="submit" name="deconnexion" value="se déconnecter" style="border-radius:10px;margin-left:47px;height:40px;width:170px"/></a>
</div>
<h2 style="margin-left:450px">Liste des administrateurs</h2>
<aside class="gestion_groupe" style="padding-bottom:100px;width:1100px;height:330px;background-color:rgb(166, 167, 164);margin-left:70px;overflow:scroll;">
		
<div class="container">
  							
		<form method="POST" action="">
				<table border="1" class="table table-dark table-hover" width="700px" height="300px" align="center" cellpadding="2px" cellspacing="0px"  >
				<tr>
					<th width="300px"  align=" center" style="font-size: 18p;" >
						pseudo
					</th>
					<th width="200px"  align="center" style="font-size: 18p;" >
						nom
					</th>
					<th width="300px"  align=" center" style="font-size: 18p;" >
						prenom
					</th>
					<th width="300px"  align=" center" style="font-size: 18p;" >
						email
					</th>
					
	
				</tr>
  				<?php do {?>
				<tr>
					<td width="200px" >
					<?php echo $affiche_ad['mat_ad'];?>
					</td>
					<td width="300px" >
					<?php echo $affiche_ad['nom_ad'];?>
					</td>
					<td width="300px" >
					<?php echo $affiche_ad['prenom_ad'];?>
					</td>
					<td width="300px" >
					<?php echo $affiche_ad['adresse'];?>
					</td>
				
					
				</tr>
				<?php }while($affiche_ad=$prepare_ad->FETCH(PDO::FETCH_ASSOC));
				?>
			</table>
				</form>
				  </div>	
	</aside>





	<h2 style="margin-left:490px">Liste des utilisateurs</h2>
<aside class="gestion_groupe" style="padding-bottom:100px;width:1100px;background-color:rgb(166, 167, 164);margin-left:70px;overflow:scroll;">
		
<div class="container">
  							
		<form method="POST" action="">
				<table border="1" class="table table-dark table-hover" width="700px" height="500px" align="center" cellpadding="2px" cellspacing="0px"  >
				<tr>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						mat_pers
					</th>
					<th width="200px" height="10px" align="center" style="font-size: 18p;" >
						nom
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						prenom
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						email
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						telephone
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						groupe
					</th>
					<th width="200px" height="10px" align="center" style="font-size: 18px;" >
						actions
					</th>
				</tr>
  				<?php do {?>
				<tr>
					<td width="200px" height="40px">
					<?php echo $affiche['mat_pers'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['nom_pers'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['prenom_pers'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['email_pers'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['tel_pers'];?>
					</td>
					<td width="300px" height="90px">
					<?php 
					
					$aff=recherche_unique("groupe","code_grp",$affiche['GROUPE_code_grp']);
					
					echo $aff['libelle_grp'];?>
					</td>
					<td width="200px" height="40px" >
					<table border="1" width="100px" cellspacing="0" cellpadding="0"><tr><td>
						<a href="sup_pers.php?  x=<?php echo $affiche['mat_pers']?>" >
							<input type="button" name="supprimer" value="Supprimer" style="background-color:red ;height:40px" class="btn_suprimmer grpesupp btn_gpr btn btn-primary" />
						 </a>
				  </td><td>
						 <a href="modif_pers.php?  x=<?php echo $affiche['mat_pers'];?>" >
						<input type="button"  name="modifier" value="Modifier" style="background-color:green ;height:40px"  class="btn_modifier grpemod btn_gpr btn btn-primary" />
						</a>
					</td>
					</tr>
								</table>
				</tr>
				<?php }while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));
				?>
			</table>
				</form>
				  </div>	
	</aside>


</body>
</html>