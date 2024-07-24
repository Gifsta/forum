<?php
require_once ("config/config.php");
require ('config/user.php');
require ('config/categorie.php');
require ('config/s_categorie.php');
session_start();
$db = new db();
$db->connecte();
if (isset($_POST['addCategorie'])) {
    $name = htmlspecialchars(($_POST['categorie']));
    $newCategorie = new Categorie();
    $newCategorie->setName($name);
    $db->addCategorie($newCategorie);
}
if (isset($_POST['addSous_categorie'])) {
    $name = htmlspecialchars(($_POST['sous_categorie']));
    $newSCategorie = new S_Categorie();
    $newSCategorie->setName($name);
    $db->addS_Categorie($newSCategorie);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include ("header.php"); ?>
    <form class="max-w-sm mx-auto" method="post">
        <div class="mb-3">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Catégorie</label>
            <input type="text" name="categorie" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
            <button name="addCategorie" type="submit"
                class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Nouvelle catégorie</button>
        </div>
    </form>
    <form class="max-w-sm mx-auto" method="post">
        <div class="mb-5">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Sous-catégorie</label>
            <input type="text" name="sous_categorie" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">

            <button name="addSous_categorie" type="submit"
                class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Nouvelle sous-catégorie</button>
        </div>
    </form>

</body>

</html>