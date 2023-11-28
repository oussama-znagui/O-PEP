<?php
session_start();
include 'config.php';
if($_SESSION['status'] != 'client'){
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

    <title>O'pep</title>
</head>
<body>
    <header class="s1 h-screen">
    <nav
  class="flex-no-wrap relative flex w-full items-center justify-between  py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
  <div class="flex w-full flex-wrap items-center justify-between px-3">
   
    

  
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent1"
      data-te-collapse-item>
      <a
        class="text-4xl font-black text-gray-900 "
        href="#">
       O'PEP
      </a>
      
     
    </div>

    
    <div class="relative flex items-center">
        <span class="mx-10"><?php echo "Bonjour " . $_SESSION['pnom']." ".$_SESSION['nom']  ?></span>
     
     <div tabindex="0" class="group relative inline-block p-5">
                    <button
                        class="border-gray-950 border-solid	border-2 rounded-full   text-black px-4 py-2 focus:outline-none">Panier</button>
                    <div
                        class=" z-10	 hidden group-focus-within:block  absolute bg-gray-50 w-96 z-1 shadow-lg animate-slideIn right-9		">
                        <div class="col-span-2 p-5">

                            <h1 class="text-xl font-medium ">Panier d'achat</h1>

                            <div id="pa">
                              <?php 
                              
                              $idp = $_SESSION['panier'];
                              $sql = "SELECT * FROM plantepanier JOIN article JOIN categorie WHERE plantepanier.id_plante = article.id AND article.id_cat = categorie.id AND id_panier = $idp";
                              $req = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_row($req)){
                              ?>

                               <div class="border w-full rounded mt-5 flex p-4 justify-between items-center flex-wrap">
                                <img src="<?php echo $row[6] ?>" class="w-12">
                                <div class="w-2/3">
                                  <h3 class="text-lg font-medium"><?php echo $row[4] ?></h3>
                                  <p class="text-gray-600 text-xs"><?php echo $row[12] ?></p>
                                </div>
                                <div>
                                  <?php
                                    $total = $row[2]*$row[9];
                                   ?>
                                  <h4 class="text-lg font-medium"><?php echo $total ?> </h4>
                                  <p>QTE : <?php echo $row[2] ?></p>
                                  
                                </div>
                                <div>
                                    <button id="vider" class="px-4 py-2 text-sm rounded-full bg-red-700">Vider</button>
                                    <button 
                                        class="px-4 py-2 text-sm rounded-full bg-green-300">Devis</button>

                                </div>
                              </div>

                            <?php
                              }


                              ?>
                             

                            </div>
                            <div class="flex flex-col justify-between items-center mt-6 pt-6 border-t gap-y-5">
                                <div>
                                    <button id="vider" class="px-4 py-2 text-sm rounded-full bg-red-700">Vider</button>
                                    <button 
                                        class="px-4 py-2 text-sm rounded-full bg-green-300">Devis</button>

                                </div>


                                <div class="flex justify-center items-end">
                                    <span class="text-sm font-medium text-black mr-1 ">Total HT: </span>
                                    <span id="total" class="mx-2 text-lg font-bold text-gray-800 "></span>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

    </div>
  </div>
</nav>
        <div class="flex justify-between items-center w-4/5 mx-auto my-10">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl ">Éveillez la vie,<br>cultivez l'avenir
                <br><span class=" text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400 ">Votre pépinière <br>de rêves verdoyants.</span></h1>
                <img class="w-1/3	" src="media/image.png" alt="">
        </div>
        

    </header>
    <main>
      <section class ="p-10">
        <h1 class = " text-center mb-4 text-3xl font-extrabold text-gray-900 dark:text-white lg:text-4xl ">NOS PLANTES</h1>
        <p class ="mb-3 text-gray-500 text-center w-2/4 mx-auto ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto voluptatibus deleniti eius voluptatem magnam consequatur. Quis ipsum neque minus, adipisci, officiis nostrum corporis asperiores veniam libero vitae blanditiis molestiae explicabo!</p>
        <?php
          $sql = 'SELECT * from article JOIN categorie ON article.id_cat = categorie.id';
          $req = mysqli_query($conn,$sql);
          if(@$_POST['chercher']){
            $titre = $_POST['titre'];
            $sql = "SELECT * from article JOIN categorie ON article.id_cat = categorie.id where article.nom like '{$titre}%' ";


          }
        ?>
        
<form class = 'w-4/5 m-auto' method = "post" action = "">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name='titre' id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" name='chercher' class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>


<div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">
  <?php  
  while(  $row = mysqli_fetch_row($req)){
?>
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                  <img class="rounded-t-lg h-2/4 w-full" src="<?php echo $row[3] ?>" alt="" />
              </a>
              <div class="p-5">
                  <a href="#">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row[1] ?></h5>
                  </a>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row[9] ?></p>
                  <a href="panier.php?id=<?php echo $row[0] ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      Ajouter au panier
                      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                      </svg>
                  </a>
                  
<script src = "./main.js"></script>
            </div>
        </div>








<?php
  }
  
  ?>
    
          
        

    
</div>



      </section>
    </main>
    
</body>
</html>