<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = "opep";
$conn = mysqli_connect($server,$user,$pass,$db);

if(!$conn){
    echo("makhdamaach");
}