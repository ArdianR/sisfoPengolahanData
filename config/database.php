<?php 
header("Access-Control-Allow-Origin: *");
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'presensi';

$con = mysqli_connect($host, $user, $password, $db);
?>