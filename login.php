<?php
require_once ('config/config.php');
require ('config/user.php');
session_start();
$db = new db();
$db->connecte();
if (isset($_POST['connexion'])) {
    if(isset($_POST['pseudoCo'])){
        $pseudo = trim(($_POST['pseudoCo']));
    }elseif(isset($_POST['emailCo'])){
        $pseudo = trim(($_POST['emailCo']));
    }
    $pseudo = trim(($_POST['pseudoCo']));
    $password = trim(($_POST['passwordCo']));
    if (!empty($pseudo) && !empty($password)) {

        $user = $db->userConnect(["user" => $pseudo, "password" => $password]);
        if ($user) {
            $_SESSION['user'] = $user;
           
        }


    }
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Connexion</title>
</head>

<body>
    <?php include ("header.php"); ?>
    <!-- component -->

    <body class="bg-white">
        <!-- url('/img/hero-pattern.svg') -->
        <div class="flex min-h-screen bg-white">

            <div class="w-1/2 bg-cover md:block hidden"
                style="background-image:  url(https://images.unsplash.com/photo-1468434453985-b1ca3b555f00?ixlib=rb-4.0.3)">
            </div>
            <!-- <div class="bg-no-repeat bg-right bg-cover max-w-max max-h-8 h-12 overflow-hidden">
            <img src="log_in.webp" alt="hey">
        </div> -->


            <div class="md:w-1/2 max-w-lg mx-auto my-24 px-4 py-5 shadow-none">

                <div class="text-left p-0 font-sans">

                    <h1 class=" text-gray-800 text-3xl font-medium">Connecte toi à ton compte Slash</h1>
                    <h3 class="p-1 text-gray-700">Bienvenue sur slash !</h3>
                </div>
                <form action="" method="post" class="p-0">
                    <div class="mt-5">
                        <input type="text" name="pseudoCo"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent "
                            placeholder="Pseudo">
                    </div>
                    <div class="mt-5">
                        <input type="email" name="emailCo"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent "
                            placeholder="Email">
                    </div>
                    <div class="mt-5">
                        <input type="password" name="passwordCo"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent  "
                            placeholder="Mot de passe">
                    </div>



                    <div class="mt-10">
                        <input type="submit" name="connexion" value="Se connecter avec son email ou son pseudo"
                            class="py-3 bg-green-500 text-white w-full rounded hover:bg-green-600">
                    </div>
                </form>
                <a class="" href="signup.php" data-test="Link"><span
                        class="block  p-5 text-center text-gray-800  text-xs ">Tu n'as pas de compte ?</span></a>
            </div>


        </div>
    </body>

</html>