<?php
session_start();
include 'config.php';
if($_SESSION['status'] != 'admin'){
  header("Location: index.php");
}

    $id = $_GET['id'];
    include 'config.php';
    $sql = "SELECT * from categorie where id = $id";
    $req = mysqli_query($conn,$sql);
    $cat = mysqli_fetch_row($req);

    if(isset($_POST['go'])){
        $nom = $_POST['nom'];
       
        
        $sql1 = "UPDATE categorie SET nom = '$nom' where id = $id;";
        $req1 = mysqli_query($conn,$sql1);
        if($req1){
            echo '<script>alert("categorie modifiée avec succes")
            document.location.href="edit-cat.php?id='. $id.'";
            </script>';
        }
               
        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Ajouter une plante</title>
</head>
<body class="bg-gray-200">
<nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <div class="flex flex-1 items-center justify-between ">
                    <div class="flex flex-shrink-0 items-center">
                        <span class="font-black text-white rounded-md px-3 py-2 text-md ">O'pep</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="admin.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Dashboard</a>
                            <a href="article.php"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Plantes</a>
                            <a href="cat.php"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">categorie</a>
                            <a href="users.php"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Gestion
                                des utilisateur</a>
                        </div>

                    </div>
                    <div>
                        <form action="logout.php" method="$post">
                            <input
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                type="submit" name="logout" value="logout">
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Dashboard</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>
<h1 class=" text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl">La categorie : <?php echo $cat[1]; ?></h1>
    <section class="flex flex-col justify-center items-center " >
        
    <form class="w-full max-w-lg bg-green-200 p-10 rounded my-4" method="post" action="">
  
    <div class="w-full  px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nom de categorie
      </label>
      <input value="<?php echo $cat[1]; ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nom" type="text" >
    </div>
    
  <input type="submit" name='go' value="Modifier" class='text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center my-5 '>
  <a href="cat.php">Liste des categories</a>
</form>
    </section>
    
</body>
</html>