<?php
session_start();
include 'config.php';
if(!$_SESSION['id']){
    header("Location: index.php");
}

    

if(isset($_POST['client'])){
    $id = $_SESSION['id'];
    $sql = "UPDATE utilisateur SET id_role = '2' WHERE id = $id";
    $req = mysqli_query($conn,$sql);
    $_SESSION['status'] = 'client';
    $sql2 = "INSERT INTO panier VALUES (NULL,'$id')";
    $req2 = mysqli_query($conn,$sql2);
      
      $sql3 = 'SELECT LAST_INSERT_ID()';
      $req3 = mysqli_query($conn,$sql3);
      $row = mysqli_fetch_row($req3);
      $_SESSION['status'] = 'client';
      $_SESSION['id'] = $id;

       $_SESSION['panier'] = $row[0];
    header("Location: client.php");


}
elseif (isset($_POST['admin'])) {
     $sql = "UPDATE utilisateur SET id_role = '0' WHERE id = $id";
    $req = mysqli_query($conn,$sql);
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
    <header class="flex justify-center items-center h-screen ">
        <div class="lg:flex justify-center items-center h-4/5 w-4/5 bg-zinc-600	p-4	">
            <div class="lg:w-2/4 h-2/4 lg:h-full	log">
            </div>
            <form class="max-w-md mx-auto 	" method="post" action="">          
            <div>
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">vous souhaitez s'inscrire autant que ??</h1>
                <button name="admin" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Admin</button>

                <button name="client" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Client</button>
            </div>
       
            </form>
            

        </div>

    </header>
    
</body>
</html>
</body>
</html>