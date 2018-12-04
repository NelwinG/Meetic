<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<script src="main.js"></script>
<title>CINEMA</title>
</head>
<body>
<div class="header">

</div> <img class="Logo" src="img/cinoche.png" alt="logo cinema">
<form class="recherche">

<img class="access" src="img/ACCESS.png" alt="logo EMPLOYEE">
<img class="computer" src="img/computer.png" alt="logo EMPLOYEE">
<ul class="navi">
<li><a href="jeux_video.php">FILMS</a></li>
<li>MEMBRES</li>
<li><a href="jeux_video.php">GENRE</a></li>
<li>ABONNEMENT</li>
<li>AVIS</li>
<li>CONTACT</li>
</ul>

<div class="nav"></div>
<form action="search.php" method="GET" class="form-inline my-2 my-lg-0">
<input name="SEARCH" class="form-control mr-sm-2" type="search" placeholder="Recherche..." aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form>



<div class="article">

<form action="distrib.php" method="GET">

<div class="form-group">

<label class="selection"for="sel1">Sélectionnez le genre:</label>


<select class="form-control control" name="DISTRIB" id="sel1" >
<option value="%">Genre</option>
<option value="0">gimages</option>
<option value="1">les films du losange</option>
<option value="2">mk2 diffusion</option>
<option value="3">rezo films</option>


</select>





<div>


<button class="btn btn-outline-success my-2 my-sm-0 button" type="submit">Appliquer</button>
</form>




</form>

<?php
try {
$bdd = new PDO('mysql:host=localhost;dbname=epitech_tp','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



if (isset($_GET['DISTRIB'])) 
{
    $reponse = $bdd->query('SELECT titre FROM film WHERE id_genre = '.$_GET["DISTRIB"].';');
    
    while ($donnees = $reponse->fetch())
    {
        echo '<p>'. $donnees['titre'] . '</p>';
    }
}  

?>

</div>

<div class="footer"></div>


</form>
</body>
</html>