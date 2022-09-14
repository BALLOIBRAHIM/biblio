
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

$requete="SELECT*FROM groupe";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);





if(isset($_POST["ajouter_grpe"]))
  {
    $code_grp=$_POST['code_grpe'];
    $libeele_grp=$_POST['lb_grpe'];
    
    $requete="INSERT INTO `groupe` (`code_grp`, `libelle_grp`) VALUES ('$code_grp', '$libeele_grp');";
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array());


	$requete="SELECT*FROM groupe";
	$prepare=$cd->prepare($requete);
	$execute=$prepare->execute();
	$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

  }

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>gestion des groupes</title>
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
  .corps_groupe{
	width:1200px;
	height: 600px;
	margin-right:20px;
	background-image:url(../images/Accueil2.jpg);
	background-size:cover;

  }
  .menu{
		background-color:rgb(166, 167, 164);
		margin-top:100px;
		width: 700px;
		margin-right: 280px;
	}

  .gestion_groupe{

	margin-top: -340px;
	margin-left: 500px;
	margin-bottom: 100px;
	padding-top: 18px;
	padding-bottom:60px;
	width:700px;
	overflow:scroll;
	background-color:rgb(136, 136, 143);
  }
  .ajout_groupe{
	margin-top: 140px;
	margin-bottom: 10px;
	margin-left:10px;
	border-radius:50px;
	background-color:rgb(136, 136, 143);
  }
  </style>
</head>
<body style=" background-color:rgb(166, 167, 164);">


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

 
			<div class="corps_groupe" style="">
				
					<aside class="ajout_groupe"  >
						<fieldset>
						<legend name="champ_ajout"style="margin-left:100px">
							ajouter un groupe ici
						</legend>
						<form method="POST" action=""> 
							<table border="0" width="400px" cellpadding="0px" cellspacing="23px" align="center" valign="center">
								<tr>
									<td colspan="2">
										<input type="text" name="code_grpe" placeholder="taper le code du groupe" class="ipt ipt_grpe" style="width:360px;border-radius:10px;margin-bottom:20px" />

									</td>
										
								</tr>
							
									<tr>
									<td colspan="2">
										<textarea name=" lb_grpe" cols="46px" rows="3px" placeholder="taper ici la description du groupe" style="border-radius:10px;margin-bottom:20px" ></textarea>

									</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" name="ajouter_grpe" value="Valider" class=" btn_gpr btn_ajouter_grpe btn btn-primary" style="width:100px;height: 40px;;border-radius:10px"/>

										
											<input type="submit" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler btn btn-primary" style="width:100px;height: 40px;;border-radius:10px"/>
										</td>
									</tr>
									<tr>
										
									</tr>
							
						</table>
						</form>
					</fieldset>
					</aside>
					<aside class="gestion_groupe">
					<div class="container">
  							<h2 style="margin-left:200px">liste des groupes</h2>
              
  						
					<form method="POST" action="">
								<table class="table table-dark table-hover" border="10" width="700px" height="500px" align="center" cellpadding="20px" cellspacing="0px"  >
								<thead>
									<tr>
									<th width="200px" height="10px"  style="font-size: 18p;" >
										code grpe
									</th>
									<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
										libéllée
									</th>
									<th width="200px" height="10px" align="center" style="font-size: 18px;" >
										actions
									</th>
									</tr>
								</thead>
								<tbody>
								<?php do{ ?>
								<tr>
									<td width="200px" height="40px" align="center">
									<?php echo $affiche['code_grp'];?>
									</td>
									<td width="300px" height="90px" align="center">
									<?php echo $affiche['libelle_grp'];?>
									</td>
									<td width="200px" height="40px" >
										<table border="1" width="100px" cellspacing="0" cellpadding="0"><tr><td>
										<a href="supprimer.php?  x=<?php echo $affiche['code_grp']?>  " >
											<input type="button" name="supprimer" value="Supprimer" style="background-color: red; height:40px" class="btn_suprimmer grpesupp btn_gpr btn btn-primary" />
									 	</a>
								</td><td>
										 <a href="modification.php?  x=<?php echo $affiche['code_grp'];?> " >
										<input type="button"  name="modifier" value="Modifier" style="background-color: green;height:40px" class="btn_modifier grpemod btn_gp btn btn-primary" />
										</a>
									</td>
								</tr>
								</table>
								</tr>
								<?php } while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
								</tbody>
							</table>
								</form>
								</div>
					</aside>
			</div>		
  </body>
</html>

