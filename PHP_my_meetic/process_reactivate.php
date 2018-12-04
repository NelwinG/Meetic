<?php
require('User.php');
session_start();

$newConnect = new User();
$tup = $newConnect->reactivateUser($_SESSION['email']);
var_dump($tup);




header('Location: http://localhost/index.php');







