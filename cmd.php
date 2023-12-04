<?php
session_start();
include 'config.php';
if($_SESSION['status'] != 'client'){
  header("Location: index.php");

}
$id_client = $_SESSION['id'];
$idp = $_SESSION['panier'];

$sql = "SELECT * FROM plantepanier JOIN article JOIN categorie WHERE plantepanier.id_plante = article.id AND article.id_cat = categorie.id AND id_panier = $idp AND plantepanier.statut = 1";
$req = mysqli_query($conn,$sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>

    <title>historique des commandes</title>
</head>
<body>
    <section>
        

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                   Categorie
                </th>
                <th scope="col" class="px-6 py-3">
                    prix uni
                </th>
                <th scope="col" class="px-6 py-3">
                    qte
                </th>
            </tr>
        </thead>
        <tbody>

<?php
while($row = mysqli_fetch_row($req)){


    ?>

<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row[6] ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $row[14] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $row[11] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $row[2] ?>
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