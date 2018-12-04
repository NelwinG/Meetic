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
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    
    <script src="jquery-3.3.1.min.js"></script>
    <script src="main.js"></script>
    
    </head>
    <body>
        <header>
        <div class="recherche">

<form action="search_users.php" method="POST">
             <label class="label" for="sex">Je recherche :</label>
            <select class="form-control controller" name="sex" id="SEX">
                <option value=""></option>
                <option value="homme"> Un Homme</option>
                <option value="femme"> Une Femme</option>
                <option value="transgenre">Autre</option>
            </select>

        <label class="label" for="date">De preference entre :</label>
            <select class="form-control controller" name="birthdate" id="SEX" >
                <option value=""></option>
                <option value="18 25">18 et 25ans</option>
                <option value="25 35">25 et 35ans</option>
                <option value="35 45">35 et 45ans</option>
                <option value="45 999">45ans et +</option>
            </select>
           

            <label class="label" for="ville">Habitant à</label>
            <input class="form-control controller" type="text"  id="city" name="city"/>

<button class="btn btn-outline-success my-2 my-sm-0 buttonsearch" type="submit">Rechercher l'âme soeur</button> 

</form>
        </div>
</header>
    <div class="base"> 
    <div id="slide">
    
	<ul>
  <?php
include_once('User.php');
$newConnection = new User();
$top = $newConnection->searchUser($_POST['sex'],$_POST['birthdate'],$_POST['city']);

   ?>
    </ul>
    <div id='precedent'>
    <img class="droite" src="img/fleche_droite.png" alt="2" width="20" height="20" />
    </div>
    <div id='suivant'>
    <img class="gauche" src="img/fleche_gauche.png" alt="2" width="20" height="20"/>
    </div>
    </div>
    
    </div>
    
    <a href="http://localhost/process_disconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Déconnexion</button></a> 
    <a href="http://localhost/index.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Profil</button></a> 
    
    </body>
    </html>