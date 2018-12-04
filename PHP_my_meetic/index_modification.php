<?php
include_once('User.php');
session_start();
if (!isset($_SESSION['email'])) 
{
    header("Location: http://localhost/connect.php");
} 
$user = new User();
$data = $user->sessionUser($_SESSION['email']);
?>
<!DOCTYPE html>


<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<script src="main.js"></script>
</head>
<body>



<div class="bases"> 

<form action="process_modification_account.php" method="POST">
<label class="label" for="nom">Nom :</label>
<input class="form-control control" type="text"  id="nom" name="NAME" value = "<?php echo $data['name'];?>"  />

<label class="label" for="prenom">Prenom :</label>
<input class="form-control control" type="text"  id="prenom" name="SURNAME" value="<?php echo $data['surname']; ?>" />

<label class="label" for="date">Date de naissance :</label>
<input class="form-control control" type="date"  id="date" name="DATE" value="<?php echo $data['birthdate']; ?>" />

<label class="label" for="sex">Civilité :</label>
<select class="form-control control" name="SEX" id="SEX" >
<option value="<?php echo $data['sex']; ?>"  ><?php echo $data['sex']; ?> </option>
<option value="homme">homme</option>
<option value="femme">femme</option>
<option value="transgenre">transgenre</option>
</select>


<label class="label" for="ville">Ville :</label>
<input class="form-control control" type="text"  id="city" name="CITY" value="<?php echo $data['city']; ?>" />

<label class="label" for="email">Votre email :</label>
<input class="form-control control" type="email"  id="email" name="EMAIL" value="<?php echo $data['email']; ?>" />

<label class="label" for="password">Votre mot de passe :</label>
<input class="form-control control" type="password"  id="password" name="PASSWORD" value=""  />

<label class="label" for="password">Veuillez confirmer mot de passe :</label>
<input class="form-control control" type="password"  id="password" name="PASSWORD2" value="" />



<button class="btn btn-outline-success my-2 my-sm-0 button1 " type="submit">Valider</button> 
<a href="http://localhost/process_desactivate.php"><button class="btn btn-outline-success my-2 my-sm-0 button1" type="submit">Désactiver le compte</button></a> 


</form>

</div>


<a href="http://localhost/process_disconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Déconnexion</button></a> 


</body>
</html> 