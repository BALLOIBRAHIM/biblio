

<?php

require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';
//declaration des variable
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

header("location:index.html");

}


}
//taille maximale du fichier
	
/*//recuperation du nom de fichier
$file=$_FILES['profil'];
	//$photo= time().'_'.$_FILES['profil']['name'];
	print_r($file);
//recuperation de la taille de fichier
	$file_size=$_FILES['profil']['size'];
//les extensions valides lors du chargement
$vald_ext=array('.jpg','.jpeg','.png','.gif','.jfif');
//test si l'image est trop grande 
	if($file_size>$maxsize_image){
		$mg="le fichier est trop gros !!";
		$css_class="erreur";
		die;
	}
// test s'il a eux erreur 
	if($_FILES['profil']['error']>0){
		$mg="une erreur est survenue lors chargement !!";
		$css_class="erreur";
		die;
	}	
//ici nous allons recuperer file texte
	$file_ext=".".strtolower(substr(strchr($_FILES['profil']['name'],'.'),1));
//test si lefichier selection est bien une image dont l'extensions valide
	if(in_array($file_ext,$vald_ext)){
		$mg="ce fichier n'est pas pris  en charge!!";
		$css_class="erreur";
		die;
	}
//c'est le dossier de destination des fichiers enregistres
	$target='../images/user/'.$photo;
//chargement du fichier
	if(move_uploaded_file($_FILES['profil']['tmp_name'],$target)){

	//insertion des element dans base donne
	$mat=$_POST['mat_pers'];
	$nom=$_POST['nom_pers'];
	$prenom=$_POST['prenom_pers'];
	$tel=$_POST['tel_pers'];
	$email=$_POST['email_pers'];
	$sexe=$_POST['sexe'];
	$groupe_pers=$_POST['groupe_pers'];
	$pwd=$_POST['pwd'];

	$req="INSERT INTO `personne` (`mat_pers`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `sexe_pers`, `photo_pers`, `GROUPE_code_grp`, `pwd`) VALUES('$mat','$nom','$prenom','$email','$tel','$sexe','$photo','$groupe_pers', `$pwd`);";
	$pre=$cd->prepare($req);
	$ex=$pre->execute(array());
	
	
		$mg="chargement reussir avec succes ";
		$css_class="succes";
		die;
	}
	else{
		
		$mg="ce fichier n'est pas pris  en charge!!";
		$css_class="erreur";
		die;

	}*/
	







?>





 <!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8"/>
 <title>s'inscrire</title>
 <link rel="stylesheet" type="text/css" href="../css/menu.css">
 <link rel="stylesheet" href="../css/css.css">
 <style>
 .aside_insc1{
	clear: both;
	float: left;
	width:230px;
	height: 230px;
	
	margin-left:500px ;
	
}
.aside_insc2{
	clear: both;
	float: left;
	
	width:600px;
	height: 300px;

	margin-left:315px ;
	margin-top:0px
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
.succes{
	background-color:black;
	color: green;
}
.erreur{
	background-color:black;
	color:red;
}
 </style>

<script >
	
	function charge_image(){
		document.querySelector('#profil').click();
	}
	function affiche_image(e){
		if(e.files[0]){
			var reader = new FileReader();
			reader.onload=function(e){
				document.querySelector('#photo').setAttribute('src',e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}



</script>

 </head>
 <body  style="background-image:url(../images/inscrie2.jfif);background-size:cover">



 <form method="POST" action="" enctype="multipart/form-data"> 

<div style="width: 1230px;height: 593px;margin-top:0px">
	<aside class="aside_insc1">
				

<input type="file" name='files[]' accept="image/jpg" size="50" multiple  id="profil" onchange="affiche_image(this)" style="display:none;">
				<input type="file" name="profil" id='profil' style="display:none" onchange="affiche_image(this)"/>
        
		        <img src="../images/LIB-BIBLI.jpg" id="photo" name="photo" style="width:225px;height:225px; border-radius:80px" onclick="charge_image()"/>
		

	
	</aside>	
	
	
	<aside class="aside_insc2">
	<aside class="ajout_groupe" style="margin-left: 12px;">
		
		
		
		
			<table border="0" width="400px" cellpadding="0px" cellspacing="23px" align="center" valign="center">
				
				
				
				<tr>
					<td colspan="2">
					<input type="text" name="mat_pers" id="mat_pers" required placeholder="taper le numero pseudo"  class="ipt ipt_grpe" />

					<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mpseudo)){echo$mpseudo;}?>
					</p>
					</td>
					<td colspan="2">
						<select style="width: 255px;
						height:30px ;" name="groupe_pers" required>
						
						<option value="aucun" selected>---- selectionner un groupe--- </option>
						<option value="aucun_groupe" >aucun groupe</option>
						<?php do {?>
							<option value="<?php echo $affiche['code_grp'];?>"> <?php echo $affiche['libelle_grp'];?></option>
							<?php } while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
						</select>

						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mgrpe)){echo$mgrpe;}?>
					</p>
					</td>
						
				</tr>	
				<tr>
					<td colspan="2">
						<input type="text" name="nom_pers" required  placeholder="taper le nom " class="ipt ipt_grpe" />

					</td>
					<td colspan="2">
						<input type="text" name="prenom_pers" required  placeholder="taper le prenom " class="ipt ipt_grpe" />

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
					<a href="index.html">
						<input type="button" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler" />
					</a>
						</td>
					</tr>
					
			
		</table>
		
	
	</aside>
				
	</aside>


	<div>
   
	</form>
				
	
		


</body>
</html>