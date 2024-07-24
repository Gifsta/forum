<?php
require_once ('config/config.php');
include ('config/post.php');
session_start();

$db = new db();
$db->connecte();


$id = $_GET['id'];

$posts = $db->getPost($id);



if (isset($_POST['addPost'])) {

    $newPost = new Posts();
    $newPost->setTitle($_POST['title']);
    $newPost->setContent($_POST['content']);
    $newPost->setId_categorie($id);
    $db->addPost($newPost);
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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

        <button name="addPost" type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Nouveau post</button>
    </form>
    <div>
    
    <section class="py-24 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-14">Les posts disponible</h2>
          <?php foreach($posts as $title) { ?>
          <div class="flex justify-center mb-14 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
             <div class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600">
              <div class="flex items-center mb-6">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpMqp2W_YJijNr3N98Qylok2ZLU6xo7w60kw&s" alt="Harsh image" class="rounded-lg w-full">
              </div>
              <div class="block">
              <h4 class="text-gray-900 font-medium leading-8 mb-9"><?php print $title; ?></h4>
                  <div class="flex items-center justify-between  font-medium">
                      <h6 class="text-sm text-gray-500">By Harsh C.</h6>
                  </div>
              </div>
             </div>
          </div>
          <?php }?>
          <a href="javascript:;" class="cursor-pointer border border-gray-300 shadow-sm rounded-full py-3.5 px-7 w-52 flex justify-center items-center text-gray-900 font-semibold mx-auto transition-all duration-300 hover:bg-gray-100">View All</a>
        </div>
    </section>
                                            
    </div>
</body>

</html>