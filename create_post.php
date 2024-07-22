<?php
require_once ('config/config.php');
include ('config/post.php');
session_start();

$db = new db();
$db->connecte();
if (isset($_POST['addPost'])) {
    $newPost = new Posts();
    $newPost->setTitle($_POST['title']);
    $newPost->setContent($_POST['content']);
    $db->addPost($newPost);
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crée un post</title>
</head>

<body>
    <?php include ("header.php"); ?>
    <form class="max-w-sm mx-auto" method="post">
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
            <input type="text" name="title" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
            <input type="text" name="content" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3  ">
        </div>
        <select
            class="py-3 px-4 pe-9 text-white bg-blue-500 hover:bg-blue-600 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none mb-6">
            <option selected="">Sélectionne une catégorie</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        <select
            class="py-3 px-4 pe-9 text-white bg-blue-600 hover:bg-blue-700 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none mb-6">
            <option selected="">Sélectionne une sous-catégorie</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        <button name="addPost" type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Nouveau post</button>
    </form>
</body>

</html>