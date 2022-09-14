
<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';

$affiche=recherche_unique("document","code_doc",$_GET['x']);

$d=$_GET['x'];

if(isset($_POST["modif_doc"]))
  {

    
    $code_doc=$_POST['code_doc'];
    $titre_doc=$_POST['titre_doc'];
	$nbpage=$_POST['nbpage_doc'];
	$auteur_doc=$_POST['auteur_doc'];
	$image_doc=$_POST["image_doc"];
	$nbex=$_POST['nbex'];
    $descr_doc=$_POST['descr_doc'];
    $requete="UPDATE `document` SET  code_doc=?, titre_doc=?, nbpage=?, auteur_doc=? ,nbex=? ,image_doc=?,descr_doc=? WHERE code_doc='$d';";
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array($code_doc,$titre_doc,$nbpage,$auteur_doc,$nbex,$image_doc,$descr_doc));

	header("location: document.php");

  }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>gestion des documents</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
<style>

.corps_groupe{

	
	height:480px;
	

}
.ajout_groupe{

margin-bottom:0px;
margin-top:40px;


border-radius:50px;
}
.ipt_grpe{
	width:352px;
	border-radius:10px;
}
</style>
</head>
<body style=" background-color:rgb(166, 167, 164);" >






<img src="../images/LIB-BIBLI.jpg"  style="width:100px;height:100px;float:left;margin-left:80px;margin-top:15px;border-radius:100px"/>
<p style="clear:both;flaot:flet;margin-left:40px;margin-bottom:-1100px">  une bibliothèque pour tous </p>


<div class="corps_groupe">
				
	<aside class="ajout_groupe">
		<fieldset style="height:550px">
		<legend name="champ_ajout"style="color:white;">
			modification du document 
		</legend>
		<form method="POST" action=""> 
			<table border="0" width="400px" cellpadding="0px" cellspacing="23px" align="center" valign="center">
				<tr>
					<td colspan="2">
						<input type="text" name="code_doc" value="<?php echo $affiche['code_doc'];?>" placeholder="taper le code du document" class="ipt ipt_grpe" />

					</td>
						
				</tr>
					<tr>
					<td colspan="2">
						<input type="text" name="titre_doc" value="<?php echo $affiche['titre_doc'];?>" placeholder="taper le titre du document" class="ipt ipt_grpe" />

					</td>
					<tr>
						<td colspan="2">
							<input type="text" name="nbpage_doc" value="<?php echo $affiche['nbpage'];?>" placeholder="taper le nombre de pages du document" class="ipt ipt_grpe" />
	
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="auteur_doc" value="<?php echo $affiche['auteur_doc'];?>" placeholder="taper le nom de l'auteur  du document" class="ipt ipt_grpe" />
	
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="nbex" value="<?php echo $affiche['nbex'];?>" placeholder="taper le nom d'exemplaire du document" class="ipt ipt_grpe" />
	
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="image_doc" value="<?php echo $affiche['image_doc'];?>" placeholder="taper le nom de l'image du document" class="ipt ipt_grpe" />
	
						</td>
					</tr>
					<tr>
					<td colspan="2">
										<textarea name=" descr_doc" cols="46px" rows="6px" placeholder="taper ici la description du document" style="border-radius:10px;" >
										<?php echo $affiche['descr_doc'];?>
										</textarea>

					</td>
  					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="modif_doc" value="Valider" class=" btn_gpr btn_ajouter_grpe"/>

						
							<input type="submit" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler" />
						</td>
					</tr>
					<tr>
						
					</tr>
			
		</table>
		</form>
	</fieldset>
	</aside>
	
</div>		

 
 
 
 </body>
 </html>