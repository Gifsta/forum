<?php
require_once ("config/config.php");
require('config/user.php');
session_start();
$db = new db();
$db->connecte();
if (isset($_POST['envoyer'])) {
    $email = htmlspecialchars(($_POST['email']));
    $pseudo = htmlspecialchars(($_POST['pseudo']));
    $password = htmlspecialchars(($_POST['password']));
    if (!empty($pseudo) && !empty($email) && !empty($password)) {
        $newUser = new Users();
        $newUser->setPseudo($pseudo);
        $newUser->setEmail($email);
        $newUser->setPassword(password_hash($password, PASSWORD_ARGON2I));
        $db->addUser($newUser);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription</title>
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

                    <h1 class=" text-gray-800 text-3xl font-medium">Créé un compte gratuitement</h1>
                    <h3 class="p-1 text-gray-700">Gratuit à vie, pas de payement ensuite</h3>
                </div>
                <form action="" method="post" class="p-0">
                    <div class="mt-5">

                        <!-- <label for="email" class="sc-bqyKva ePvcBv">Email</label> -->
                        <input type="mail" name="email"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent "
                            placeholder="Email">
                    </div>
                    <div class="mt-5">
                        <input type="text" name="pseudo"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent "
                            placeholder="Pseudo">
                    </div>
                    <div class="mt-5">
                        <input type="password" name="password"
                            class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent  "
                            placeholder="Mot de passe">
                    </div>



                    <div class="mt-10">
                        <input type="submit" name="envoyer" href="index.php" value="S'inscrire avec son email"
                            class="py-3 bg-green-500 text-white w-full rounded hover:bg-green-600">
                    </div>
                </form>
                <a class="" href="login.php" data-test="Link"><span
                        class="block  p-5 text-center text-gray-800  text-xs ">Tu as déja un compte ?</span></a>
            </div>


        </div>
    </body>

</html>