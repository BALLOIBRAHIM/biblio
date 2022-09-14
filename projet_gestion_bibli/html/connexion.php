
<?php

session_start();
require 'erreur.php';
$cd=new PDO('mysql:host=localhost;dbname=gestion','root','');
require 'function.php';


if(isset($_POST['connexion'])){

    $pseudo=$_POST['pseudo'];
    $pwd=$_POST['pwd'];

    $administrateur=recherche_multi("administrateur","mat_ad","pwd",$pseudo,$pwd);
    
    $user=recherche_multi("personne","mat_pers","pwd",$pseudo,$pwd);
    if($administrateur){
        $_SESSION['mat_ad']=$administrateur['mat_ad'];
        $_SESSION['nom_ad']=$administrateur['nom_ad'];
        $_SESSION['premon_ad']=$administrateur['prenom_ad'];
        header("location: index_ad.php?mat_ad=".$_SESSION['mat_ad']);
    }
    else{

        if($user){
            $_SESSION['mat_pers']=$user['mat_pers'];
            $_SESSION['nom_pers']=$user['mon_pers'];
            $_SESSION['prenom_pers']=$user['prenom_pers'];
            header("location: index_user.php?mat_pers=".$_SESSION['mat_pers']);
        }
        else{
            $mg="pseudo ou mot de passe incorrect";
            
        }
    }

}

?>






<!DOCTYPE html>
<html>

<!--le head ou entête -->
<head>
    <meta charset="utf-8"/>
    <title> connexion </title>
    <link rel="stylesheet" href="../css/connexion.css"/>
</head>
<!-- le corps ou body-->
<body style="background-color:black;background-size: ;">
   <div class="corps">
   <div class="connexion">
       <span > <h1 class="sph1" >connexion</h1></span>
    <form method="POST" action="">
        
            <table border="0" cellspacing="20px" width="390px" align="center">
                <tr><td style="color:red;">
                    <?php if(isset($mg)){
                        echo$mg;
                    }?></td>
                </tr>
                <tr>
                    <td><input type="text" name="pseudo" required placeholder="taper votre identifiant ou pseudo" style="width: 300px;height: 30px;"> </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><input type="password" name="pwd" required placeholder="taper votre mot de passe  " style="width: 300px;height: 30px;"> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="connexion" value="se connecter" style="width: 100px;height: 30px;"><a href="index.html">  <input type="button" name="btn_annuler" value="Annuler" style="width: 100px;margin-left: 100px;height: 30px;"></a> </td>
                </tr>
            </table>

        

    </form>
</div>

</div>
</body>

</html>