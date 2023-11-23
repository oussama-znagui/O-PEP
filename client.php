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
  class="flex-no-wrap relative flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
  <div class="flex w-full flex-wrap items-center justify-between px-3">
   
    

  
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent1"
      data-te-collapse-item>
      <a
        class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
        href="#">
       O'PEP
      </a>
      
     
    </div>

    
    <div class="relative flex items-center">
        <span class="mx-10"><?php echo "Bonjour " . $_SESSION['pnom']." ".$_SESSION['nom']  ?></span>
     
      <a class="mr-4 text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#">
        <span class="[&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-5 w-5">
            <path
              d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
          </svg>
        </span>
      </a>

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
        

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">
  <?php  
  $sql = 'SELECT * from article JOIN categorie ON article.id_cat = categorie.id';
  $req = mysqli_query($conn,$sql);

  while(  $row = mysqli_fetch_row($req)){

?>
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                  <img class="rounded-t-lg h-2/4" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
              </a>
              <div class="p-5">
                  <a href="#">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row[1] ?></h5>
                  </a>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row[9] ?></p>
                  <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      Read more
                      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                      </svg>
                  </a>
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