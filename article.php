<?php
include 'config.php'



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>O'PEP ADMIN</title>
</head>
<body>
    <section class="flex flex-col justify-center items-center">
        
    <h1 class = " text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl ">Liste des produit</h1>
    <a href="ajout-p.php" class = " m-auto  focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Ajouter une Plante</a>

<div class="my-10 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Plante
                </th>
                <th scope="col" class="px-6 py-3">
                    Origine
                </th>
                <th scope="col" class="px-6 py-3">
                    taille
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Prix
                </th>
                <th scope="col" class="px-6 py-3">
                    Categorie
                </th>
                <th scope="col" class="px-6 py-3">
                    Operation
                </th>
            </tr>
        </thead>
        <tbody>

        <?php  
  $sql = 'SELECT * from article JOIN categorie ON article.id_cat = categorie.id';
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
                <?php echo $row[6] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row[9] ?>
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