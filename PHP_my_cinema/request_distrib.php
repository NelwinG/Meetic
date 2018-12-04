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
<li><a href="request_distrib.php">FILMS</a></li>
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

  <label class="selection"for="sel1">Sélectionnez le distributeur:</label>
  

<select class="form-control control" name="DISTRIB" id="sel1" >
<option value="%">Distribution</option>
<option value="0">gimages</option>
<option value="1">les films du losange</option>
<option value="2">mk2 diffusion</option>
<option value="3">rezo films</option>
<option value="4">studio images 5</option>
<option value="5">eiffel productions</option>
<option value="6">cerito films</option>
<option value="7">france 3</option>
<option value="8">tartan films</option>
<option value="9">monarchy enterprises b.v.</option>
<option value="10">advanced</option>
<option value="11">the vista organisation group</option>
<option value="12">les films balenciaga</option>
<option value="13">art-light productions</option>
<option value="14">telinor</option>
<option value="15">bandidos films</option>
<option value="16">parco co, ltd</option>
<option value="17">transfilm</option>
<option value="18">dmvb films</option>
<option value="19">davis-panzer productions</option>
<option value="20">idea productions</option>
<option value="21">vision international</option>
<option value="22">films a2</option>
<option value="23">dog eat dog productions</option>
<option value="24">the carousel pictures company</option>
<option value="25">interlight</option>
<option value="26">deluxe productions</option>
<option value="27">lolistar</option>
<option value="28">united international pictures (uip)</option>
<option value="29">verve pictures</option>
<option value="30">entertainement film distributors ltd</option>
<option value="31">eros film ltd.</option>
<option value="32">dogwoof pictures</option>
<option value="33">guerilla film ltd.</option>
<option value="34">ica films</option>
<option value="35">sony pictures</option>
<option value="36">20th century fox</option>
<option value="37">contender entertainement</option>
<option value="38">momentum pictures</option>
<option value="39">adlabs films</option>
<option value="40">artificial eye</option>
<option value="41">the works</option>
<option value="42">peccadillo pictures</option>
<option value="43">metrodome films</option>
<option value="44">icon film distribution uk</option>
<option value="45">bfi distribution</option>
<option value="46">optimum releasing</option>
<option value="47">miracle comms</option>
<option value="48">revolver entertainment</option>
<option value="49">soda pictures</option>
<option value="50">national film theater</option>
<option value="51">revelation films</option>
<option value="52">ace films</option>
<option value="53">path&amp;atilde;&amp;copy;</option>
<option value="54">v&amp;atilde;&amp;copy;rtigo films</option>
<option value="55">park circus</option>
<option value="56">buena vista international</option>
<option value="57">yeah yeah yeah ltd.</option>
<option value="58"> swipe films</option>
<option value="59">universal</option>
<option value="60">paramount pictures</option>
<option value="61">warner bros uk</option>
<option value="62">showbox media group</option>
<option value="63">united pictures international uk</option>
<option value="64">paramount pictures uk</option>
<option value="65">buena vista international uk</option>
<option value="66">universal international pictures uk</option>
<option value="67">punk distribution</option>
<option value="68">axiom films</option>
<option value="69">eros international ltd.</option>
<option value="70">sony pictures uk</option>
<option value="71">lions gate films home entertainement</option>
<option value="72">utv motion pictures</option>
<option value="73">british patg&amp;atilde;&amp;copy;</option>
<option value="74">maiden voyage pictures</option>
<option value="75">warner music entertainment</option>
<option value="76"><i>utv motion pictures</i></option>
<option value="77">lionsgates uk</option>
<option value="78">yumes pictures</option>
<option value="79">delanic films</option>
<option value="80">vertigo films</option>
<option value="81">path&amp;atilde;&amp;copy;distribution ltd.</option>
<option value="82">spark pictures</option>
<option value="83">slingshot</option>
<option value="84">diffusion pictures</option>
<option value="85">transmedia pictures</option>
<option value="86">cinefilm</option>
<option value="87">odeon sky filmworks</option>
<option value="88">liberation entertainment</option>
<option value="89">lagoon entertainment</option>
<option value="90">halcyon pictures</option>




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
        $reponse = $bdd->query('SELECT titre FROM film WHERE id_distrib = '.$_GET["DISTRIB"].';');
        
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