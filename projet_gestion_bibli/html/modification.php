
<?php
 require 'erreur.php';
 $cd=new PDO('mysql:host=localhost;dbname=gestion','root','');



 $va=$_GET['x'];
 
 $requete="SELECT* FROM groupe WHERE code_grp=? ";
 $prepare=$cd->prepare($requete);
 $execute=$prepare->execute(array($_GET['x']));
 $affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
  



if(isset($_POST["modification_grpe"]))
  {
    $d=$_GET['x'];
    $code_grp=$_POST['code_grpe'];
    $libeele_grp=$_POST['lb_grpe'];
    
    $requete="UPDATE groupe SET code_grp=?, libelle_grp=?  WHERE code_grp = '$d'";
    echo$d;
    $prepare=$cd->prepare($requete);
    $execute=$prepare->execute(array($code_grp,$libeele_grp));


	header("location: groupe.php");

  }

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>modification d'un groupe</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
<style>

.corps_groupe{

	
	height:480px;
	

}
.ajout_groupe{

margin-bottom:0px;
margin-top:40px;
height:300px;

border-radius:50px;
}

</style>
</head>
<body style=" background-color:rgb(166, 167, 164);" >


<img src="../images/LIB-BIBLI.jpg"  style="width:100px;height:100px;float:left;margin-left:80px;margin-top:15px;border-radius:100px"/>
<p style="clear:both;flaot:flet;margin-left:40px;margin-bottom:-1100px">  une bibliothèque pour tous </p>



 
			<div class="corps_groupe">
				
					<aside class="ajout_groupe">
						<fieldset style="border-radius:100px;height:250px">
						<legend name="champ_ajout"style="color:white;">
							 
						</legend>
						<form method="POST" action=""> 
							<table border="0" width="400px" cellpadding="0px" cellspacing="23px" align="center" valign="center">
								<tr>
									<td colspan="2">
										<input type="text" name="code_grpe" value="<?php echo $affiche["code_grp"]; ?>" placeholder="taper le code du groupe" class="ipt ipt_grpe" style="width:351px;border-radius:10px;"/>

									</td>
										
								</tr>
									<tr>
									<td colspan="2">
										<textarea name=" lb_grpe" cols="46px" rows="6px" placeholder="taper ici la description du groupe" value="" style="border-radius:10px;"><?php echo $affiche['libelle_grp']; ?></textarea>

									</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" name="modification_grpe" value="Valider" class=" btn_gpr btn_ajouter_grpe"/>

										
											<a href="groupe.php"><input type="submit" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler" /></a>
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

