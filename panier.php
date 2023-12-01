<?php

include 'config.php';
session_start();
if(!$_GET['id']){
    header('Location: client.php');
}
$id_plante = $_GET['id'];
$id_client = $_SESSION['id'];
$idp = $_SESSION['panier'];
$sql = "SELECT * from plantepanier where id_panier = $idp AND id_plante = $id_plante";
$req = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($req);
if($row == 0){
    $sql1 = "INSERT into plantepanier values(NULL,'$idp','$id_plante',1,0)";
    $req1 = mysqli_query($conn,$sql1);
     header('Location: client.php');
    
}else{
    $qte = $row[3];
    $qte++;
    $sql2 = "UPDATE plantepanier SET qte = $qte where id_panier = $idp AND id_plante = $id_plante";
    $req2  = mysqli_query($conn,$sql2);
    header('Location: client.php');
    


}



?>