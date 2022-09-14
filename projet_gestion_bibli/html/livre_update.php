<?php
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');

//declaration des variable

$valide=0;
$mgrpe="";
$mg="";
$memail="";
$mtel="";
$mpseudo="";
$css_class="";
$requete="SELECT*FROM personne";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

$requete_doc="SELECT*FROM document";
$prepare_doc=$cd->prepare($requete_doc);
$execute_doc=$prepare_doc->execute();
$affiche_doc=$prepare_doc->FETCH(PDO::FETCH_ASSOC);

if(isset($_POST['emprunter'])){
	$doc=$_POST['doc'];
	if(isset($_POST['perss'])){$pers=$_POST['perss'];}
	else{$pers=$_POST['pers'];}
	
	$date_retour=$_POST['date_sortie'];
	$person=recherche_unique("personne","mat_pers",$pers);
    $pergrpcode=$person['GROUPE_code_grp'];
    
    
    $requete="UPDATE `emprunter` SET `date_retour` = '$date_retour' WHERE `emprunter`.`PERSONNE_mat_pers` = '$pers' AND `emprunter`.`PERSONNE_GROUPE_code_grp` = '$pergrpcode' AND `emprunter`.`DOCUMENT_code_doc` = '$doc';";
    
    
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array());

}





?>

<!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8"/>
<style>
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
 <body >
<form method="POST" action="" enctype="multipart/form-data">
		<table border="1" width="400px" cellpadding="10px" cellspacing="23px" align="center" valign="center">
			
				<tr>
					<td colspan="2">
					<select style="width: 250px;
						height:30px ;margin-bottom: 0px;" name="pers" required>
						
						<option value="aucun" selected>---selectionner une personne--- </option>
						
						<?php 
                        
                        $requete="SELECT * FROM `personne` ";
                        $prepare=$cd->prepare($requete);
                        $execute=$prepare->execute();
                        $affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
                        
                        do {?>
						  
							<option value="<?php echo $affiche['mat_pers'];?>"> <?php echo $affiche['mat_pers'];?></option>
							<?php } while($afiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
						</select>
						<input type="text" name="perss" placeholder="taper le code de la personne" style="width: 250px;"/>

						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mgrpe)){echo$mgrpe;}?>
					</p>
					</td>
					<td colspan="2" rowspan="4">
						
						<div style="overflow:scroll;width:260px;height:300px">
						<?php do {  
							 echo $affiche_doc['code_doc'];
							
							?>
							   <img src="<?php echo $affiche_doc['image_doc'];?>" style="width:200px;height:200px;"/> <input type="radio" name="doc" value="<?php echo $affiche_doc['code_doc'];?>" />
							<?php } while($affiche_doc=$prepare_doc->FETCH(PDO::FETCH_ASSOC));?>
						
							</div>
						<p class="<?php if(isset($css_class)){echo$css_class;}?>">
					<?php if(isset($mgrpe)){echo$mgrpe;}?>
					</p>

					</td>
						
				</tr>	
				<tr>
					<td colspan="2">
						<input  style="margin-bottom: 20px; width:250px" type="date" name="date_sortie" required  placeholder="taper le nom " class="ipt ipt_grpe" />

					</td>
					
						
				</tr>
					
					
				
					<tr>
						<td colspan="2" align=center>

						<input  class="btn btn-primary" type="submit" name="emprunter" value="retourner" style="border-radius:10px;height:40px;width:170px"/>

					</tr>
					
			
		</table>
		</form>
                        </body>
                        </html>