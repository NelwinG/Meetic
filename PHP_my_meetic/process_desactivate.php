<?php
require('User.php');
session_start();

$newConnect = new User();
$tup = $newConnect->desactivateUser($_SESSION['email']);
var_dump($tup);









session_unset();
session_destroy();




header('Location: http://localhost/connect.php');