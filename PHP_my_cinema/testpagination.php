<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $GenreParPage = 5;
    $GenreTotalReq = $bdd->query('SELECT titre FROM film WHERE id_genre = '.$_GET["GENRE"].' LIMIT '.$depart.','.$GenreParPage.';');
    $GenreTotal = $GenreTotalReq->rowCount();
    if (isset($_GET['GENRE']) AND (!empty($_GET['GENRE'])) AND $_GET['GENRE'] > 0) 
    {
        $_GET['GENRE']= intval($_GET['GENRE']);
        $pageCourante = $_GET['GENRE'];
    }
    else {
        $pageCourante = 1;
    }

    echo $pageCourante;
    $depart = ($pageCourante-1)*$GenreParPage;



?>