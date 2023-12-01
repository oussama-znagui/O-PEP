<?php
include 'config.php';

if(!$_GET['id']){
    header("Location: client.php");
}
$id = $_GET['id'];
echo $id;
$sql = "INSERT into commande values (NULL,$id)";
$req = mysqli_query($conn,$sql);
$sql2 = "UPDATE plantepanier SET statut = 1 where id_plantePanier = $id";
$req2 = mysqli_query($conn,$sql2);
header("Location: client.php");

?>