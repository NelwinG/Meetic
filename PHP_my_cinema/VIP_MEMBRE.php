<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
<form action="recherche_membres.php" method="GET" class="form-inline my-2 my-lg-0">
<input name="MEMBRE" class="form-control mr-sm-2" type="search" placeholder="Recherche de membres..." aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
<a href="page_accueil.php"><img class="home" src="img/home1.png" alt="ecran accueil"></a>
</form>

</div>


<a href="page_accueil.php"><img class="Logo" src="img/cinoche.png" alt="logo cinema"></a>
<form class="recherche">





<div class="article">




<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    echo UCFIRST($_GET["MEMBRE"]); 
    
    $sql = 'SELECT historique_membre.id_membre, historique_membre.id_film, historique_membre.date, fiche_personne.nom, fiche_personne.prenom , film.titre  
    FROM historique_membre 
    INNER JOIN fiche_personne ON fiche_personne.id_perso = historique_membre.id_membre 
    INNER JOIN film ON historique_membre.id_film = film.id_film
    WHERE id_membre = $_GET["ID_MEMBRE"];';
    $reponse = $bdd->query($sql);





    while ($donnees = $reponse->fetch())
    {
        echo '<p> . UCFIRST($_GET["ID_MEMBRE"]) . $donnees["titre"] . $donnees["date"] . </p>';
        
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