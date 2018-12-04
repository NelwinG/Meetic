<?php
require('User.php');

$birth = $_POST['birthdate'];
$currentdate = date("d-m-Y");
$birth = new DateTime($birth);
$currentdate = new DateTime($currentdate);
// var_dump($currentdate);
$dateDiff = date_diff($birth, $currentdate); 


$newConnect = new User();
$top = $newConnect->sessionUser($_POST['EMAIL']);



if ($dateDiff->y >= 18 && $_POST['PASSWORD'] == $_POST['PASSWORD2'] && count($top) == 0)
{   
    session_start();
    $newConnect = new User();
    $tup = $newConnect->subscribeUser($_POST['NAME'], $_POST['SURNAME'],$_POST['DATE'], $_POST['SEX'],$_POST['CITY'], $_POST['EMAIL'], sha1($_POST['PASSWORD']));

    
    $_SESSION['email'] = $_POST['EMAIL'];
    $data = $newConnect->sessionUser($_SESSION['email']);
    
var_dump($data['name']);

    header('Location: http://localhost/index.php');
}
else
{
    
    header('Location: http://localhost/subscribe.html');
}

// echo $dateDiff->y;




// var_dump($tup);





