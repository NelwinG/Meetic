<?php
session_start();
require('User.php');

$birth = $_POST['DATE'];
$currentdate = date("d-m-Y");
$birth = new DateTime($birth);
$currentdate = new DateTime($currentdate);
// var_dump($currentdate);
$dateDiff = date_diff($birth, $currentdate); 
$newConnect = new User();
if ($dateDiff->y >= 18 && $_POST['PASSWORD'] == $_POST['PASSWORD2'] && !empty($_POST['PASSWORD']))
{    
 
    $tup = $newConnect->updateUser($_POST['NAME'], $_POST['SURNAME'],$_POST['DATE'], $_POST['SEX'],$_POST['CITY'], $_POST['EMAIL'], sha1($_POST['PASSWORD']));
    // var_dump($tup);
    $_SESSION['email'] = $_POST['EMAIL'];
 
    header('Location: http://localhost/index.php');
}
else if($dateDiff->y >= 18 && $_POST['PASSWORD'] == "")
 {
    $tup = $newConnect->updateUser($_POST['NAME'], $_POST['SURNAME'],$_POST['DATE'], $_POST['SEX'],$_POST['CITY'], $_POST['EMAIL']);
    // var_dump($tup);
    $_SESSION['email'] = $_POST['EMAIL'];
    header('Location: http://localhost/index.php');
}
else {

    header('Location: http://localhost/index_modification.php');
 }