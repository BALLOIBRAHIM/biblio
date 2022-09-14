
<?php
session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';
$admin=recherche_unique("administrateur","mat_ad",$_GET['x']);
$valide=0;
$d=$_GET['x'];
if(isset($_POST['ajout_ad'])){
	$photo="";
//insertion des element dans base donne

$ad=$_GET['x'];


$mat=$ad;


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

		
        $valide+=1;

	}
	else{
		$mpseudo="desolé ce pseudo ne peut être changer!!";
		$css_class="erreur";
		
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
$req="UPDATE `administrateur` SET `nom_ad` = '$nom', `prenom_ad` = '$prenom', `adresse` = '$email',`pwd` = '$pwd' WHERE `administrateur`.`mat_ad` = 'admin01';";

$pre=$cd->prepare($req);

$ex=$pre->execute(array());

header("location:index_ad.php? mat_ad=".$_SESSION['mat_ad']);

}


}

?>

 <!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8"/>
 <title>modification du profil</title>
 <link rel="stylesheet" type="text/css" href="../css/menu.css">
 <link rel="stylesheet" href="../css/css.css">


	<style>

.enre{
	width:600px;
	height:400px;
	float:left;
	margin-left:130px;
	background-color:black;
	margin-top:180px;
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






<div class="enre" style="background-color:rgb(243, 215, 59);">
<h2 style="margin-left: 120px;"> modifier mes informations</h2>
<div style="background-color:grey;height:340px" >
	<form method="POST" action="" enctype="multipart/form-data">
		<table border="0" width="400px" cellpadding="10px" cellspacing="23px" align="center" valign="center">
				
				
				
				<tr>
					<td colspan="2">
					<input style="margin-top: 40px;" type="text" value="<?php echo $admin['mat_ad']?>" name="mat_ad" id="mat_ad" required placeholder="taper le pseudo"  class="ipt ipt_grpe" />

					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mpseudo)){echo$mpseudo;}?>
					</p>
					</td>
					<td colspan="2">
					
					<input style="margin-top: 40px;"  type="text" value="<?php echo $admin['adresse']?>" name="email_ad" required  placeholder="taper l'email " class="ipt ipt_grpe" />
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($memail)){echo$memail;}?></p>
					</td>
						
				</tr>	
				<tr>
					<td colspan="2">
						<input  style="margin-bottom: 20px;" type="text" value="<?php echo $admin['nom_ad']?>" name="nom_ad" required  placeholder="taper le nom " class="ipt ipt_grpe" />

					</td>
					<td colspan="2">
						<input style="margin-bottom: 20px;" type="text" name="prenom_ad" value="<?php echo $admin['prenom_ad']?>" required  placeholder="taper le prenom " class="ipt ipt_grpe" />

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