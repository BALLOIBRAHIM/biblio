
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

$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
//selection de tous les genres disponible
$requete_genre="SELECT*FROM genre";
$prepare_genre=$cd->prepare($requete_genre);
$execute_genre=$prepare_genre->execute();
$genre=$prepare_genre->FETCH(PDO::FETCH_ASSOC);


$requete_genres="SELECT*FROM genre";
$prepare_genres=$cd->prepare($requete_genres);
$execute_genres=$prepare_genres->execute();
$genres=$prepare_genres->FETCH(PDO::FETCH_ASSOC);


if(isset($_POST["envoye_genre"]))
  {
	  
    $nom_genre=$_POST['genre_type'];
    $dossier=$_POST['genre_dossier'];
	
    
    $requete_genre="INSERT INTO `genre` (`type`, `dossier`) VALUES ('$nom_genre', '$dossier');";
    $prepareinsert_genre=$cd->prepare($requete_genre);
    $execute=$prepareinsert_genre->execute(array());
	


	$requete_genre="SELECT*FROM genre";
$prepare_genre=$cd->prepare($requete_genre);
$execute_genre=$prepare_genre->execute();
$genre=$prepare_genre->FETCH(PDO::FETCH_ASSOC);




  }

if(isset($_POST["ajouter_doc"]))
  {
    $code_doc=$_POST['code_doc'];
    $titre_doc=$_POST['titre_doc'];
	$nbpage=$_POST['nbpage_doc'];
	$auteur_doc=$_POST['auteur_doc'];
	$nbex=$_POST['nbex'];
	$image_doc=$_POST['groupe_genre'].$_POST['image_doc'];
	$descr_doc=$_POST['descr_doc'];

    
    $requete="INSERT INTO `document` (`code_doc`, `titre_doc`, `nbpage`, `auteur_doc`, `nbex`, `image_doc`, `descr_doc`) VALUES ('$code_doc','$titre_doc', '$nbpage', '$auteur_doc', '$nbex', '$image_doc', '$descr_doc');";
    $prepareinsert=$cd->prepare($requete);
    $executet=$prepareinsert->execute(array());
	
	

	$requete="SELECT*FROM document";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

  }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>gestion des documents</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
<style>
	.genre{
		width:1230px;
		height:500px;
		clear:both;
		float:left;
		margin-top:-30px;
		
		margin-left:18px
	}
	.genre_a{
		width:450px;
		height:200px;
		float:left;
		margin-left:15px;
		background-color:grey;
	}
	.genre_lt{
		clear:both;
		float:right;
		height:330px;
		width:700px;
		overflow:scroll;
		margin-top:-330px;
	}
	.genre_aj{
		
		height:330px;
		margin-top:20px;
	}
	.ajout_groupe{
		background-color:green;
		width:500px;
		clear:both;
		float:left;
		margin-left:0px;
		margin-top:200px;
	}
	.gestion_groupe{
		clear:both;
		float:right;
		padding-top:200px;
		margin-right:0px;
		background-color:yellow

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
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
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

<div class="genre">
<span class="baniere" style="margin-top: 20px;">
  
   <p style="text-align: center;font-size:xx-large;margin-top: 30px;background-color: rgb(95, 102, 107);">Les gestion des genres de document </p>
 
</span>
<span class="genre_a genre_aj ">

<div class="container">
  <h2>ajouter un genre</h2>
 
  <form action="" method="POST">
    <div class="form-group">
      <label for="genre_type">Nom du genre:</label>
      <input type="text" class="form-control"  placeholder="Entrer genre" name="genre_type" required>
    
      <div class="invalid-feedback">veillez renseigner ce champs</div>
    </div>
    <div class="form-group">
      <label for="genre_dossier">dossier:</label>
      <input type="text" class="form-control"  placeholder="Entrer chemin du dossier" name="genre_dossier" required>
      
      <div class="invalid-feedback">veillez renseigner ce champs</div>
    </div>

    <input type="submit" class="btn btn-primary" name="envoye_genre" style="height:50px"/>
  </form>
</div>


</span>
<span class=" genre_a genre_lt "> <div class="container">
  <h2>liste des genres</h2>
              
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>name</th>
        <th>dossier</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      
	
 <?php do {?>
				<tr>
					<td >
					<?php echo $genre['type'];?>
					</td>
					<td >
					<?php echo $genre['dossier'];?>
					</td>
					<td >
						<table border=1 align="center" style="margin-top:23px"><tr><td width="100px" height="20px"><a href="modif_doc.php?  x=<?php echo $genre['type'];?> " >
						<input type="button"  name="modifier" value="Modifier" class="btn_modifier grpemod btn_gpr" style="height:40px;" />
						</a>
						</td>
						<td width="100px" height="20px" ><a href="sup_genre.php? x=<?php echo $genre['type'];?>  " >
							<input type="button" name="supprimer" value="Supprimer" class="btn_suprimmer grpesupp btn_gpr" style="height:40px;background-color:red;"/>
						 </a>
						</td>
						</tr>
						</table>
					</td>
				</tr>
				<?php }while($genre=$prepare_genre->FETCH(PDO::FETCH_ASSOC));?>
	 
    </tbody>
  </table>
</div></span>
</div>

	

<div class="genre">
<span class="baniere" style="margin-top: 20px;">
  
   <p style="text-align: center;font-size:xx-large;margin-top: 30px;background-color: rgb(95, 102, 107);">Les gestion des genres de document </p>
 
</span>
<span class="genre_a genre_aj " style="width: 600px;margin-left:50px;background-color:none">
<h4 style="margin-left:150px;font-family: cursive;"> enregistrer un document</h4>
<form method="POST" action=""> 
			<table border="" width="200px" cellpadding="5px" cellspacing="23px" align="center" valign="center" style="margin-top:30px;">
				<tr>
					<td >
						<input type="text" name="code_doc" placeholder=" code du document" class="ipt ipt_grpe" />

					</td>
					<td >
						<input type="text" name="titre_doc" placeholder=" titre du document" class="ipt ipt_grpe" />

					</td>	
					
				</tr>
					<tr>
					<td >
							<input type="text" name="nbpage_doc" placeholder=" nombre de pages du document" class="ipt ipt_grpe" />
	
						</td>
						<td >
							<input type="text" name="auteur_doc" placeholder="nom de l'auteur  du document" class="ipt ipt_grpe" />
	
						</td>
						
					</tr>
					
					<tr>
						<td>
							<input type="text" name="nbex" placeholder=" nombre exemplaire du document" class="ipt ipt_grpe" />
	
						</td>
						<td >
							<input type="text" name="image_doc" placeholder=" nom de votre image" class="ipt ipt_grpe" value="<?php if(isset($_POST["photo"])){echo$_REQUEST["photo"];}?>" />
	
						</td>
					</tr>
					
					<tr>
						<td >
						<textarea name=" descr_doc" cols="31px" rows="3px" placeholder="taper ici la description du document" ></textarea>
						</td>
						<td >
						<select style="width: 250px;
						height:30px ;" name="groupe_genre">
						<option >---- selectionner un genre---</option>
						<?php do {?>
							<option value="<?php echo $genres['dossier'];?>"><?php echo$genres['type'];?> </option>
							<?php }while($genres=$prepare_genres->FETCH(PDO::FETCH_ASSOC));?>
						</select>
					</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="ajouter_doc" value="Valider" class=" btn_gpr btn_ajouter_grpe btn btn-primary" style="height:40px"/>
						</td>
						<td>
							<input type="submit" name="annuler" value="Anuler"  class=" btn_gpr btn_annuler btn btn-primary" style="height:40px;background-color:red;" />
						</td>
					</tr>
					
			
		</table>
		</form>


</span>

<span class="genre_a genre_aj " style="border-radius:130px;margin-left:60px">

<form method="POST" action="">
	<img src="../images/LIB-BIBLI.jpg" onclick="charge_image()" name="photo"  id="photo" style="width:300px;height:300px;float:left;margin-left:80px;margin-top:15px;border-radius:100px"/>
<input type="file" name='file' accept="image/jpg" size="50" multiple  id="profil" onchange="affiche_image(this)" style="display:none;">



</form>


</span>

<span class=" genre_a genre_lt " style="margin-top:140px;margin-right:-10px;height:500px;width:1250px;overflow:scroll; padding-right:200px"> <div class="container">
  <h1 style="margin-left:400px;font-family: cursive;">liste des documents</h1>
              
  <table class="table table-dark table-hover" style="width:1200px;">
    <thead>
	<tr>
					<th width="300px" height="10px" align=" center"  >
						code doc
					</th>
					<th width="300px" height="10px" align="center"  >
						titre
					</th>
					<th width="300px" height="10px" align=" center"  >
						description
					</th>
					<th width="300px" height="10px" align=" center"  >
						pages
					</th>
					<th width="300px" height="10px" align=" center"  >
						auteur
					</th>
					<th width="300px" height="10px" align=" center"  >
						exemplaire
					</th>
					<th width="300px" height="10px" align=" center"  >
						image
					</th>
					<th width="300px" height="10px" align="center"  >
						<h4 style="margin-left:130px ">actions</h4>
					</th>
				</tr>
    </thead>
    <tbody>
	<?php do {?>
				<tr>
					<td >
					<?php echo $affiche['code_doc'];?>
					</td>
					<td >
					<?php echo $affiche['titre_doc'];?>
					</td>
					<td >
					<?php echo $affiche['descr_doc'];?>
					</td>
					<td >
					<?php echo $affiche['nbpage'];?>
					</td>
					<td >
					<?php echo $affiche['auteur_doc'];?>
					</td>
					<td>
					<?php echo $affiche['nbex'];?>
					</td>
					<td >
					
					<img src="<?php echo $affiche['image_doc'];?>" style="width:200px;height:200px;"/>
					
					</td>
					<td width="300px" height="40px" align="center" >
						<table border=1 align="center" style="margin-top:23px"><tr><td width="100px" height="20px"><a href="modif_doc.php?  x=<?php echo $affiche['code_doc'];?> " >
						<input type="button"  name="modifier" value="Modifier" class="btn_modifier grpemod btn_gpr" style="height:40px;" />
						</a>
						</td>
						<td width="100px" height="20px" ><a href="sup_doc.php? x=<?php echo $affiche['code_doc'];?>  " >
							<input type="button" name="supprimer" value="Supprimer" class="btn_suprimmer grpesupp btn_gpr" style="height:40px;background-color:red;"/>
						 </a>
						</td>
						</tr>
						</table>
					</td>
				</tr>
				<?php }while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));?>
    </tbody>
  </table>
</div></span>
</div>



	
	
		

 
 
 
 </body>
 </html>