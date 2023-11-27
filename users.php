<?php
include 'config.php';
session_start();
include 'config.php';
if($_SESSION['status'] != 'admin'){
  header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Gestion des utilisateur</title>
</head>
<body>
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
    
    <section class="flex flex-col justify-center items-center">
        
    <h1 class = " text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl ">Liste des utilisateur</h1>
    <a href="" class = " m-auto  focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Ajouter un utilisateur</a>

<div class="my-10 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    nom
                </th>
                <th scope="col" class="px-6 py-3">
                    prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                
                <th scope="col" class="px-6 py-3">
                    role
                </th>
              
            </tr>
        </thead>
        <tbody>

        <?php  
  $sql = 'SELECT * from utilisateur JOIN role ON utilisateur.id_role = role.id';
  $req = mysqli_query($conn,$sql);

  while(  $row = mysqli_fetch_row($req)){

?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $row[0] ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $row[1] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row[2] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row[4] ?>
                </td>
               
                <td class="px-6 py-4">
                <?php echo $row[7] ?>
                </td>
                
                <td class="px-6 py-4">
                <a class="mx-2 text-green-500" href="edit-plante.php?id=<?php echo $row[0] ?>">Edit</a>
                <a class="mx-2 text-red-500" href="suprimer.php?id=<?php echo $row[0] ?>">Suprimer</a>
                </td>
               
            </tr>
            


            <?php
  }
  ?>
    
        </tbody>
    </table>
</div>
<h1 class = " text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl ">Liste des utilisateur sans role</h1>

<div class="my-10 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    nom
                </th>
                <th scope="col" class="px-6 py-3">
                    prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                
                
              
            </tr>
        </thead>
        <tbody>

        <?php  
  $sql1 = "SELECT * from utilisateur  where id_role is null ";
  $req1 = mysqli_query($conn,$sql1);

  while(  $row = mysqli_fetch_row($req1)){

?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $row[0] ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $row[1] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row[2] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row[4] ?>
                </td>
               
                
                
                <td class="px-6 py-4">
                <a class="mx-2 text-green-500" href="edit-plante.php?id=<?php echo $row[0] ?>">Edit</a>
                <a class="mx-2 text-red-500" href="suprimer.php?id=<?php echo $row[0] ?>">Suprimer</a>
                </td>
               
            </tr>
            


            <?php
  }
  ?>
    
        </tbody>
    </table>
</div>

    </section>
</body>
</html>