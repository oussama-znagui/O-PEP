<?php
include 'config.php';
session_start();
if(isset($_POST['go'])){
    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * from utilisateur where email = '$mail' AND pass = '$pass';";
    $req = mysqli_query($conn,$sql);
    $user = mysqli_fetch_row($req);
    if($user == 0){
        echo '<script>alert("mail ou mot de pass incorect")
            document.location.href="login.php";
            </script>';
    }
    else{
        if($user[5] == 1){
            $_SESSION['status'] = 'admin';
            $_SESSION['fullname'] = $user[1];
            $_SESSION['id'] = $user[0];
            header("Location: admin.php");

        }
        if($user[5] == 2){
            $_SESSION['status'] = 'client';
            $_SESSION['pnom'] = $user[1] ;
            $_SESSION['nom'] = $user[2]  ;
            $_SESSION['id'] = $user[0];
            $panier_sql = "SELECT * from panier where id_client = $user[0]";
            $panier_req = mysqli_query($conn,$panier_sql);
            $panier = mysqli_fetch_row($panier_req);

            $_SESSION['panier'] = $panier[0]  ;
            header("Location: client.php");

        }
        if($user[5] == null){
            $_SESSION['status'] = '';
            $_SESSION['fullname'] = $user[1];
            header("Location: choix.php");

        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Connectez-vous</title>
</head>
<body>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
         
          Bienvenue chez O'pep    
      </a>
      <div class="w-full bg-green-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              Connectez-vous
              </h1>
              <form class="space-y-4 md:space-y-6" action="" method='post'>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de pass</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  
                  <button name="go" type="submit" class="w-full text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                  Vous n'avez pas encore de compte?<a href="index.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
    
</body>
</html>