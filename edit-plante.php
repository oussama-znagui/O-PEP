<?php
    $id = $_GET['id'];
    include 'config.php';
    $sql = 'SELECT * from categorie';
    $req = mysqli_query($conn,$sql);
    $sql2 = "SELECT * from article,categorie where article.id = $id AND article.id_cat = categorie.id;";
    $req2 = mysqli_query($conn,$sql2);
    $plante = mysqli_fetch_row($req2);

    if(isset($_POST['go'])){
        $nom = $_POST['nom'];
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $taille = $_POST['taille'];
        $origine = $_POST['origine'];
        $tep = $_POST['temperature'];
        $img = $_POST['img'];
        
        $sql1 = "UPDATE article SET nom = '$nom',Origine = '$origine',img = '$img',Taille = '$taille',Température = '$tep', Prix = $prix,id_cat = $categorie where id = $id;        ";
        $req1 = mysqli_query($conn,$sql1);
        if($req1){
            echo '<script>alert("Plante modifiée avec succes")
            document.location.href="edit-plante.php?id='. $id.'";
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
<h1 class=" text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl">La plante : <?php echo $plante[1]; ?></h1>
    <section class="flex flex-col justify-center items-center " >
        
    <form class="w-full max-w-lg bg-green-200 p-10 rounded my-4" method="post" action="">
  
    <div class="w-full  px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nom de plante
      </label>
      <input value="<?php echo $plante[1]; ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nom" type="text" >
    </div>
    <div class="w-full  px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Lien image (media/...)
      </label>
      <input value="<?php echo $plante[3]; ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="img" type="text" >
    </div>
    
  
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        prix
      </label>
      <input value="<?php echo $plante[6]; ?>" name="prix"  class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type='number' step='0.1'>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Origine
      </label>
      <input value="<?php echo $plante[2]; ?>" name="origine"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Taille
      </label>
      <input value="<?php echo $plante[4]; ?>" name="taille"  class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" >
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Temperature
      </label>
      <input value="<?php echo $plante[5]; ?>" name="temperature" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
    </div>
  </div>
  
  <div class="flex flex-wrap -mx-3 mb-2">
   
    <div class="w-full  px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Categorie
      </label>
      <div class="relative">
        <select name="categorie"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option selected value='<?php echo $plante[8]; ?>'><?php echo $plante[9]; ?></option>
            <?php
            
            while($row=mysqli_fetch_row($req)){
            ?>

        <option value='<?php echo $row[0]; ?>'><?php echo $row[1]; ?></option>
            <?php
            }
            ?>
          
          
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    
  </div>
  <input type="submit" name='go' value="Modifier" class='text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center my-5 '>
  <a href="article.php">Liste des plantes</a>
</form>
    </section>
    
</body>
</html>