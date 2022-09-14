

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
$requete="SELECT*FROM groupe";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

if(isset($_POST['ajout_pers'])){
	$photo="";
//insertion des element dans base donne
if(isset($_POST['profil'])){
$photo=$_POST['profil'];
}
else{
	$photo="aucune image choisie";
}



$mat=$_POST['mat_pers'];


$nom=$_POST['nom_pers'];
$prenom=$_POST['prenom_pers'];
$tel=$_POST['tel_pers'];
$email=$_POST['email_pers'];
$sexe=$_POST['sexe'];
$groupe_pers=$_POST['groupe_pers'];

$pwd=$_POST['pwd'];

$regexnum='/^([0-9]{10})$/';
$regexmail='/^[a-zA-Z0-9]+@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/';
if(isset($mat)){
	$pseudo=recherche_unique("personne","mat_pers",$mat);
	if($pseudo){

		$mpseudo="desolé ce pseudo est déjâ utilisé!!";
		$css_class="erreur";


	}
	else{
		$valide+=1;
		
	}

}

if(isset($groupe_pers)){
	
	$valide+=1;
}
else{
	$mgrpe="choisiez un groupe!!";
		$css_class="erreur";

}

if($_POST['pwd']==$_POST['pwdv']){
	$valide+=1;
}
else{
	$mg="les deux mots de passe ne sont pas correcte!!";
		$css_class="erreur";	
}
if(preg_match($regexmail,$email)){
	$valide+=1;
	

}
else{

	$memail="email non valide!!";
		$css_class="erreur";	
}
if(preg_match($regexnum,$tel)){
	$valide+=1;
	

}
else{

	$mtel="le numero doit avoir 10 chiffres !!";
		$css_class="erreur";	
}


if($valide==5){
$req="INSERT INTO `personne` (`mat_pers`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `sexe_pers`, `photo_pers`, `GROUPE_code_grp`, `pwd`) VALUES ('$mat', '$nom', '$prenom', '$email', '$tel', '$sexe', '$photo', '$groupe_pers', '$pwd');  ";

$pre=$cd->prepare($req);

$ex=$pre->execute(array());

header("location:liste_personne.php");

}


}

//ajout d'un administrateur
if(isset($_POST['ajout_ad'])){
	$photo="";
//insertion des element dans base donne




$mat=$_POST['mat_ad'];


$nom=$_POST['nom_ad'];
$prenom=$_POST['prenom_ad'];

$email=$_POST['email_ad'];
$sexe=$_POST['sexe_ad'];


$pwd=$_POST['pwd_ad'];

$regexnum='/^([0-9]{10})$/';
$regexmail='/^[a-zA-Z0-9]+@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/';
if(isset($mat)){
	$pseudo=recherche_unique("administrateur","mat_ad",$mat);
	if($pseudo){

		$mpseudo="desolé ce pseudo est déjâ utilisé!!";
		$css_class="erreur";


	}
	else{
		$valide+=1;
		
	}

}



if($_POST['pwd_ad']==$_POST['pwdv_ad']){
	$valide+=1;
}
else{
	$mg="les deux mots de passe ne sont pas correcte!!";
		$css_class="erreur";	
}
if(preg_match($regexmail,$email)){
	$valide+=1;
	

}
else{

	$memail="email non valide!!";
		$css_class="erreur";	
}



if($valide==3){
$req="INSERT INTO `administrateur` (`mat_ad`, `nom_ad`, `prenom_ad`, `adresse`, `sexe_ad`, `pwd`) VALUES ('$mat', '$nom', '$prenom', '$email', '$sexe', '$pwd'); ";

$pre=$cd->prepare($req);

$ex=$pre->execute(array());

header("location:liste_personne.php");

}


}



?>





 <!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8"/>
 <title>s'inscrire</title>
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
	background-color:black;
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
	<h2 style="margin-left: 130px; color:white"> inscrire un utilisateur</h2>
	<div style="background-color:grey;height:340px" >
	<form method="POST" action="" enctype="multipart/form-data">
		<table border="0" width="400px" cellpadding="10px" cellspacing="23px" align="center" valign="center">
				
				
				
				<tr>
					<td colspan="2">
					<input style="margin-bottom: 0px;" type="text" name="mat_pers" id="mat_pers" required placeholder="taper le pseudo"  class="ipt ipt_grpe" />

					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mpseudo)){echo$mpseudo;}?>
					</p>
					</td>
					<td colspan="2">
						<select style="width: 250px;
						height:30px ;margin-bottom: 0px;" name="groupe_pers" required>
						
						<option value="aucun" selected>---- selectionner un groupe--- </option>
						<option value="aucun_groupe" >aucun groupe</option>
						<?php do {?>
							<option value="<?php echo $affiche['code_grp'];?>"> <?php echo $affiche['libelle_grp'];?></option>
							<?php } while($afiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
						</select>

						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mgrpe)){echo$mgrpe;}?>
					</p>
					</td>
						
				</tr>	
				<tr>
					<td colspan="2">
						<input  style="margin-bottom: 20px;" type="text" name="nom_pers" required  placeholder="taper le nom " class="ipt ipt_grpe" />

					</td>
					<td colspan="2">
						<input style="margin-bottom: 20px;" type="text" name="prenom_pers" required  placeholder="taper le prenom " class="ipt ipt_grpe" />

					</td>
						
				</tr>

				<tr>
					<td colspan="2">
						<input type="text" name="email_pers" required  placeholder="taper l'email " class="ipt ipt_grpe" />
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($memail)){echo$memail;}?>
					</p>
					</td>
					<td colspan="2">
						
					<input type="number" step="any" min="0"  name="tel_pers" required maxlength="10" placeholder="taper le numero de telephone " class="ipt ipt_grpe" />
					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mtel)){echo$mtel;}?>
					</p>
				</td>
						
				</tr>

				<tr>
					<td colspan="2" style="color: white;" align=center>
					<input type="password" name="pwd" required placeholder="taper le mot de passe " class="ipt ipt_grpe" style="float:left;"/>
					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mg)){echo$mg;}?>
					</p>	
					</td>
					<td colspan="2" style="color: white;" align=center>
						
						<input type="password" name="pwdv" required placeholder="retaper le mot de passe " class="ipt ipt_grpe" style="float:left;"/>
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
		<?php if(isset($mg)){echo$mg;}?>
		</p>	
					</td>
					</tr>

				<tr>
					<td colspan="2" style="color: white;" align=center>
						<input type="radio" name="sexe" value="Homme" required/>
						Homme
						
					</td>
					<td colspan="2" style="color: white;" align=center>
						<input type="radio" name="sexe" value="Femme"/>
						Femme

					</td>
					</tr>
					
					
				
					<tr>
						<td colspan="2" align=center>
							<input type="submit" name="ajout_pers" value="Valider" class=" btn_gpr btn_ajouter_grpe" />

						
							
						</td>
						<td colspan="2" align=center >
					<a href="#">
						<input type="button" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler" />
					</a>
						</td>
					</tr>
					
			
		</table>
		</form>
	<div>
<div>
	
<div class="enre" style="margin-left:620px;background-color:rgb(243, 215, 59); margin-top:-375px;">
<h2 style="margin-left: 125px;"> inscrire un administrateur</h2>
<div style="background-color:grey;height:340px" >
	<form method="POST" action="" enctype="multipart/form-data">
		<table border="0" width="400px" cellpadding="10px" cellspacing="23px" align="center" valign="center">
				
				
				
				<tr>
					<td colspan="2">
					<input style="margin-top: 40px;" type="text" name="mat_ad" id="mat_ad" required placeholder="taper le pseudo"  class="ipt ipt_grpe" />

					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mpseudo)){echo$mpseudo;}?>
					</p>
					</td>
					<td colspan="2">
					
					<input style="margin-top: 40px;"  type="text" name="email_ad" required  placeholder="taper l'email " class="ipt ipt_grpe" />
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($memail)){echo$memail;}?></p>
					</td>
						
				</tr>	
				<tr>
					<td colspan="2">
						<input  style="margin-bottom: 20px;" type="text" name="nom_ad" required  placeholder="taper le nom " class="ipt ipt_grpe" />

					</td>
					<td colspan="2">
						<input style="margin-bottom: 20px;" type="text" name="prenom_ad" required  placeholder="taper le prenom " class="ipt ipt_grpe" />

					</td>
						
				</tr>

				

				<tr>
					<td colspan="2" style="color: white;" align=center>
					<input type="password" name="pwd_ad" required placeholder="taper le mot de passe " class="ipt ipt_grpe" style="float:left;"/>
					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mg)){echo$mg;}?>
					</p>	
					</td>
					<td colspan="2" style="color: white;" align=center>
						
						<input type="password" name="pwdv_ad" required placeholder="retaper le mot de passe " class="ipt ipt_grpe" style="float:left;"/>
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
		<?php if(isset($mg)){echo$mg;}?>
		</p>	
					</td>
					</tr>

				<tr>
					<td colspan="2" style="color: white;" align=center>
						<input type="radio" name="sexe_ad" value="Homme" required/>
						Homme
						
					</td>
					<td colspan="2" style="color: white;" align=center>
						<input type="radio" name="sexe_ad" value="Femme"/>
						Femme

					</td>
					</tr>
					
					
				
					<tr>
						<td colspan="2" align=center>
							<input type="submit" name="ajout_ad" value="Valider" class=" btn_gpr btn_ajouter_grpe" />

						
							
						</td>
						<td colspan="2" align=center >
					<a href="#">
						<input type="button" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler" />
					</a>
						</td>
					</tr>
					
			
		</table>
		</form>
	<div>
</div>


</body>
</html>