
<?php

if(isset($_POST['submit'])){
	$email=$_POST['email_pers'];
	$regexmail='/^[a-zA-Z0-9]+@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/';
$regexnum='/^([0-9]{10})$/';
if(!isset($_FILES["files"])){
	var_dump($_FILES["files"]);
}

if(preg_match($regexmail,$email)){
	$valide+=1;
	echo$memail="email valide!!";

}
else{

	echo$memail="email non valide!!";
		$css_class="erreur";	
}
var_dump($_REQUEST["files"]);

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>test </title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" href="../css/css.css">
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
<body >

<form method="POST" action="">
	<img src="../images/photo.jpg" onclick="charge_image()" name="photo"  id="photo" />
<input type="file" name='files[]' accept="image/jpg" size="50" multiple  id="profil" onchange="affiche_image(this)" style="display:none;">

<input type="text" name="email_pers" required  placeholder="taper l'email " class="ipt ipt_grpe" />
<input type="submit" name="submit">
</form>
</body>
</html>
