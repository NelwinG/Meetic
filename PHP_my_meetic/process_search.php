<?php
include_once('User.php');




$newConnection = new User();
$top = $newConnection->searchUser($_POST['sex'],$_POST['birthdate'],$_POST['city']);

// while (!empty($top))
// {
//     echo '<p>'. $top[1]['name'] . '</p>';
// }
    





//          while ($donnees = $reponse->fetch())
//          {
    //              echo '<li>'. $donnees['SEX'] . '</li>';
    //          }
    //     header('Location: http://localhost/search_users.php');
    
    // $pizza  = $_POST['birthdate'];
    
    // $toz = explode(" ", $pizza);
    
    
    
    
    
    
    