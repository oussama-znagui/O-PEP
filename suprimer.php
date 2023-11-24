<?php
    $id = $_GET['id'];
    include 'config.php';
    


  
        
        $sql1 = "DELETE from article where id = $id;        ";
        $req1 = mysqli_query($conn,$sql1);
        if($req1){
            echo '<script>alert("Plante Suprimée avec succes")
            document.location.href="article.php";
            </script>';
        }
               
        
    