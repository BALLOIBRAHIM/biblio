<?php 
$cnx=new PDO('mysql:host=localhost;dbname=file_attente','root',"");
//si on clic sur le bouton ajouter
if($_POST['ajouter']){
    
    $code_agent=$_POST['code_agent'];
    $nom_prenom_agent=$_POST['nom_prenom_agent'];
    $email_agent=$_POST['email_agent'];
    $mot_de_passe_agent=$_POST['mot_de_passe_agent'];
    $numero_agent=$_POST['numero_agent'];
    $ville_agent=$_POST['ville_agent'];
    $code_postal_agent=$_POST['code_postal_agent'];
    $code_service=$_POST['code_service'];

    
    $requete="INSERT INTO agent (code_agent,nom_prenom_agent,email_agent,mot_de_passe_agent,numero_agent,ville_agent,code_postal_agent,code_service) VALUES ('$code_agent', '$nom_prenom_agent', '$email_agent', ' $mot_de_passe_agent', '$numero_agent', '$ville_agent', ' $code_postal_agent', '$code_service');";
    $prepare = $cnx -> prepare($requete);
    $execute = $prepare->execute(array());

    header("location:agent.php");
}

   $cnx=new PDO('mysql:host=localhost;dbname=file_attente','root',"");
   $requete="SELECT*FROM service";
   $prepare=$cnx->prepare($requete);
   $execute=$prepare->execute(array());?>

<!DOCTYPE html> 
<meta charset="utf-8"> 
<html>
  <body>
  <link rel="stylesheet" href="agent.css" type="text/css">
    <title> Agent </title>
    
<div class="adduser">
<form action="" method="post">
<span class="txt">NOUVEAU</span>
    <table border="1" cellspacing="10" cellpadding="10">

    <tr>
        <th> code_agent :</th>
        <td><input type="text"name="code_agent" value="" required placeholder=" Entrer vote code"></td>
    </tr>
    <tr>
        <th> nom_prenom_agent :</th>
        <td><input type="text"name="nom_prenom_agent" value="" required placeholder=" Entrer votre nom & prenom"></td>
    </tr>
    <tr>
        <th> email_agent : </th>
        <td> <input type="text"name="email_agent" value="" required placeholder="Ajouter email"></td>
    </tr>
    <tr>
        <th> mot_de_passe_agent : </th>
        <td> <input type="password"name="mot_de_passe_agent" required value=""placeholder=" Entrer le mot de passe"></td>
    </tr>
    <tr>
        <th>numero_agent : </th>
        <td> <input type="number"name="numero_agent" required value=""placeholder="Entrer  votre numero"></td>
    </tr>
    <tr>
        <th> ville_agent: </th>
        <td> <input type="text"name="numero_agent" required value=""placeholder="Entrer  votre ville"></td>
    </tr>
    <tr>
        <th> code_postal_agent : </th>
        <td> <input type="text"name="ville_agent" required value=""placeholder="Ajouter code_postal"></td>
    </tr>
    <tr>
        <th><label for="service">choisir un service: </label> </th>
        <td> <select name="code_service" required>
       <option value="">-choisir une option-</option>
       <?php while ($lecture=$prepare->fetch(PDO::FETCH_ASSOC)):?>
        <option value ="<?php echo $lecture['code_service']?>"><?php echo $lecture['nom_service']?></option>
        <?php 
        endwhile;?>
        </select></td>
    </tr>
    <tr>
        <td colspan="2"> <input type="submit"name="ajouter" value=" Ajouter" style="width:300px"></td>
    </tr>
    </table>

  
   
  
  
        

    </form>
    </div>
    </body>
    </html>