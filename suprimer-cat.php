<?php

    if(!$_GET['id']){
      header("Location: article.php");
    }
    $id = $_GET['id'];
    include 'config.php';
    


  
        
        $sql1 = "DELETE from categorie where id = $id;        ";
        $req1 = mysqli_query($conn,$sql1);
        if($req1){
            echo '<script>alert("categorie Suprimée avec succes")
            document.location.href="cat.php";
            </script>';
        }
               
        
    