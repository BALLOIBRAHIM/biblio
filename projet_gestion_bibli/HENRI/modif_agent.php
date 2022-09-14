<?php
$cnx=new PDO('mysql:host=localhost;dbname=file_attente','root',"");


$val=$_GET['agent'];
$requete="SELECT*FROM agent WHERE agent.code_agent=?";
$prepare=$cnx->prepare($requete);
$execute=$prepare->execute(array($val));
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

if(isset($_POST['modifier'])){
    $d=$_GET['agent'];
    $code_agent=$_POST['code_agent'];
    $nom_prenom_agent=$_POST['nom_prenom_agent'];
    $email_agent=$_POST['email_agent'];
    $mot_de_passe_agent=$_POST['mot_de_passe_agent'];
    $numero_agent=$_POST['numero_agent'];
    $ville_agent=$_POST['ville_agent'];
    $code_postal_agent=$_POST['code_postal_agent'];
    $code_service=$_POST['code_service'];




    $requete="UPDATE `agent` SET  code_agent=?, nom_prenom_agent=?, email_agent=?, mot_de_passe_agent=? ,numero_agent=? ,ville_agent=?,code_postal_agent=?,code_service=? WHERE code_agent='$d';";
    $prepareinsert=$cd->prepare($requete);
    $execute=$prepareinsert->execute(array($code_agent, $nom_prenom_agent, $email_agent, $mot_de_passe_agent, $numero_agent, $ville_agent,  $code_postal_agent, $code_service));
    
 

    header("location:agent.php");
}
$req="SELECT*FROM service WHERE service.code_service=?";
$pr=$cnx->prepare($req);
$execu=$pr->execute(array($val));
$affiche_service=$pr->FETCH(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html> 
<meta charset="utf-8"> 
<html>
  <body>
  <link rel="stylesheet" href="agent.css" type="text/css">
    <title> modification d'agent </title>
    
<div class="adduser">
<form action="" method="post">
<span class="txt">modification</span>
    <table border="1" cellspacing="10" cellpadding="10">

    <tr>
        <th> code_agent :</th>
        <td><input type="text"name="code_agent" value="<?php echo $affiche['code_agent']?>" required placeholder=" Entrer vote code"></td>
    </tr>
    <tr>
        <th> nom_prenom_agent :</th>
        <td><input type="text"name="nom_prenom_agent" value="<?php echo $affiche['nom_prenom_agent']?>" required placeholder=" Entrer votre nom & prenom"></td>
    </tr>
    <tr>
        <th> email_agent : </th>
        <td> <input type="text"name="email_agent" value="<?php echo $affiche['email_agent']?>" required placeholder="Ajouter email"></td>
    </tr>
    <tr>
        <th> mot_de_passe_agent : </th>
        <td> <input type="password"name="mot_de_passe_agent" required value=" <?php echo $affiche['mot_de_passe_agent']?>"placeholder=" Entrer le mot de passe"></td>
    </tr>
    <tr>
        <th>numero_agent : </th>
        <td> <input type="number"name="numero_agent" required value="<?php echo $affiche['numero_agent']?>"placeholder="Entrer  votre numero"></td>
    </tr>
    <tr>
        <th> ville_agent: </th>
        <td> <input type="text"name="numero_agent" required value="<?php echo $affiche['ville_agent']?>"placeholder="Entrer  votre ville"></td>
    </tr>
    <tr>
        <th> code_postal_agent : </th>
        <td> <input type="text"name="ville_agent" required value="<?php echo $affiche['code_postal_agent']?>"placeholder="Ajouter code_postal"></td>
    </tr>
    <tr>
        <th><label for="service">choisir un service: </label> </th>
        <td> <select name="code_service" required>
       <option value="">-choisir une option-</option>
       <option value="<?php echo $affiche['nom_prenom_agent']?>" selected><?php echo$affiche_service['nom_service']?></option>
       <?php while ($lecture=$prepare->fetch(PDO::FETCH_ASSOC)):?>
        <option value ="<?php echo $lecture['code_service']?>"><?php echo $lecture['nom_service']?></option>
        <?php 
        endwhile;?>
        </select></td>
    </tr>
    <tr>
        <td colspan="2"> <input type="submit"name="modifier" value="modifier" style="width:300px"></td>
    </tr>
    </table>

    </form>
    </div>
    </body>
    </html>