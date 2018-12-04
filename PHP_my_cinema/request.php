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
<div class="header navbar">

<img class="access" src="img/ACCESS.png" alt="logo EMPLOYEE">
<img class="computer" src="img/computer.png" alt="logo EMPLOYEE">
<ul class="navi">
<li><a href="request.php">FILMS</a></li>
<li>MEMBRES</li>
<li><a href="request.php">GENRE</a></li>
<li>ABONNEMENT</li>
<li>AVIS</li>
<li>CONTACT</li>
</ul>
<form action="search.php" method="GET" class="form-inline my-2 my-lg-0">
<input name="SEARCH" class="form-control mr-sm-2" type="search" placeholder="Recherche..." aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
<a href="recherche.php"><img class="loupe" src="img/search2.png" alt="search"></a>
<a href="recherche_membres.php"><img class="personne" src="img/personne.png" alt="search"></a>
<a href="page_accueil.php"><img class="home" src="img/home1.png" alt="ecran accueil"></a>
</form>

</div>


<a href="page_accueil.php"><img class="Logo" src="img/cinoche.png" alt="logo cinema"></a>
<form class="recherche">



<div class="article">

<form action="request.php" method="GET">

<div class="form-group">

<label class="selection"for="sel1">Sélectionnez le genre:</label>


<select class="form-control control" name="GENRE" id="sel1" >
<option value="%">Genre</option>
<option value="0">detective</option>
<option value="1">dramatic comedy</option>
<option value="2">science fiction</option>
<option value="3">drama</option>
<option value="4">documentary</option>
<option value="5">animation</option>
<option value="6">comedy</option>
<option value="7">fantasy</option>
<option value="8">action</option>
<option value="9">thriller</option>
<option value="10">adventure</option>
<option value="11">various</option>
<option value="12">historical</option>
<option value="13">western</option>
<option value="14">romance</option>
<option value="15">music</option>
<option value="16">musical</option>
<option value="17">horror</option>
<option value="18">war</option>
<option value="19">unknow</option>
<option value="20">spying</option>
<option value="21">historical epic</option>
<option value="22">biography</option>
<option value="23">experimental</option>
<option value="24">short film</option>
<option value="25">erotic</option>
<option value="26">karate</option>
<option value="27">program</option>
<option value="28">family</option>
<option value="29">exp&amp;atilde;&amp;copy;rimental</option>


</select>





<div>


<button class="btn btn-outline-success my-2 my-sm-0 button" type="submit">Appliquer</button>
</form>




</form>




<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    
    
    if (isset($_GET['GENRE'])) 
    {
        $reponse = $bdd->query('SELECT titre FROM film WHERE id_genre = '.$_GET["GENRE"].';');
        
        while ($donnees = $reponse->fetch())
        {
            echo '<p>'. $donnees['titre'] . '</p>';
        }
    }  
    
  
    if (isset($_GET['SEARCH']) && $_GET['SEARCH'] != "")
    {
        $sql = 'SELECT titre FROM film WHERE titre LIKE \'%'.$_GET["SEARCH"].'%\';';
        $reponse = $bdd->query($sql);
        
         while ($donnees = $reponse->fetch())
         {
             echo '<p>'. $donnees['titre'] . '</p>';
         }
    }


    

} 
catch (PDOExeption $e) 
{
    echo "Connection failed : " . $e->getMessage();
}

?>







</div>

<div class="footer"></div>


</form>
</body>
</html>