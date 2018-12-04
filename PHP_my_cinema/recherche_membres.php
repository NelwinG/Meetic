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
  
  
    if (isset($_GET['MEMBRE']) && $_GET['MEMBRE'] != "")
    {
        $sql = 'SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_membre FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE nom LIKE "%' .$_GET['MEMBRE']. '%" OR prenom LIKE "%' .$_GET['MEMBRE']. '%";';
        $reponse = $bdd->query($sql);
        
        
         while ($donnees = $reponse->fetch())
         {
             echo '<table> <p class="membre">' . $donnees['nom'] . ' ' . $donnees['prenom'] . '</td> <p> </table>
             <a href="VIP_MEMBRE.php?MEMBRE= '. $donnees["nom"] .'&PRENOM= '. $donnees["prenom"] . '&ID_ MEMBRE= ' .$donnees['id_membre']. 
             '"<button class="btn btn-outline-success my-2 my-sm-0 edite" type="submit">Editer</button></a> </br> </br>  ';
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