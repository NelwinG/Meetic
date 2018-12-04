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



<div class="window_activate"> 
<p> Votre comptes est temporairement desactivé, vous pouvez le reactiver a tout moments. </p> </br>
<p> Voulez vous reactiver votre compte maintenant ? </p> 

<a href="http://localhost/process_reactivate.php"><button class="btn btn-outline-success my-2 my-sm-0 button1" type="submit">Activer</button></a> 
<a href="http://localhost/process_desactivate.php"><button class="btn btn-outline-success my-2 my-sm-0 button1" type="submit">Annuler</button></a> 

</div>


<a href="http://localhost/process_disconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Déconnexion</button></a> 


</body>
</html> 