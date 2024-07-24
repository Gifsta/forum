<?php
require_once('config/config.php');
session_start();
$db = new db();
$db->connecte();
$categories = $db->getCategorie();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>

<body>
    <?php include ("header.php"); ?>
    <?php foreach ($categories as $categorie) { ?>
    <div class="flex w-[1140px] m-auto  bg-[#7ab50b] rounded">
            <p><?php print $categorie['name'];?></p>
        </div>
        <?php foreach ($db->getS_Categorie($categorie['id']) as $Scategorie) { ?>
    <div class="flex w-[1140px] ml-[389px] mr-[x] bg-[#b9e665] rounded">
        <p><a href="create_post.php?id=<?php print $Scategorie['id'];?>"><?php print $Scategorie['name'];?></a></p>
    </div>
    <?php }?>
    
    </div>
    <?php }?>

    

</body>

</html>