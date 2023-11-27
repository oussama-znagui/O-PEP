<?php

include 'config.php';
if(!$_GET['id']){
    header('Location: client.php');
}
$id_plante = $_GET['id'];
$id_client = $_SESSION['id'];
$idp = $_SESSION['panier']
$sql = 'SELECT * from plantepanier where id_panier = $i'



?>