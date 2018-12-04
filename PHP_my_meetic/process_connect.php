<?php
session_start();
require('User.php');
$newConnect = new User();
$tup = $newConnect->connectUser($_POST['EMAIL'], sha1($_POST['PASSWORD']));

$user = new User();
$data = $user->sessionUser($_POST['EMAIL']);
// var_dump($tup);


if(count($tup) == 1 && $data['active'] == 1) 
{   
    var_dump($data);
    
    $_SESSION['email'] = $_POST['EMAIL'];

    $data = $newConnect->sessionUser($_SESSION['email']);

     header('Location: http://localhost/index.php');
    
    
    

}
else if(count($tup) == 1 && $data['active'] == 0) 
{
    session_start();
    $_SESSION['email'] = $_POST['EMAIL'];

    $data = $newConnect->sessionUser($_SESSION['email']);
    
    header('Location: http://localhost/validation_index.php');
}
else 
{
    header('Location: http://localhost/connect.php');
}




