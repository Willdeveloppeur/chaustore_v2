<?php require_once 'conn.php' ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Product Chaustore Management</title>
</head>

<body>
    <h1>Product Chaustore Management</h1>
    <a href="chaustore.php"><input type="button" value="Accueil" /></a>
    <input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>

    <form method="POST" action="">

        <input id="visu_btn" name="visualiser" type="button" value="Visualiser">
        <input id="add_btn" name="ajouter" type="button" value="Ajouter">
        <input id="mod_btn" name="modifier" type="button" value="Modifier">
        <input id="delete_btn" name="supprimer" type="button" value="Supprimer">
    </form>


 
    <!-- Block to Add a Product -->
    <div id='add'> 

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["catadd"])) {
            $catname = $_POST['catadd'];
            $req = "INSERT INTO category (name) VALUES ('$catname');";
            mysqli_query($conn, $req);
        } ?>
        <form id="addForm" method="POST" action="product_manage.php">
            <label for="catadd">Ajouter une catégorie </label>
            <input type="text" id="catadd" name="catadd" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_product.php" ?>
    </div>






<!-- Block to modify a cat -->
    <div id='mod'>
        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["mod"])) {
            $catmod = $_POST['mod'];
            $idcat = $_POST['id'];
            $req = "UPDATE `category` SET `name`=('$catmod') WHERE  `id`=('$idcat');";
            mysqli_query($conn, $req);
        } ?>
        <form id="modForm" method="POST" action="cat_manage.php">
            <label for="catid">Entre l'ID de la catégorie à modifier</label>
            <input type="text" id="catid" placeholder="ID to modify" name="id" value='' />
            <label for="catmod">Modifier le nom de la catégorie</label>
            <input type="text" id="catmod" placeholder="New Brand name" name="mod" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_product.php" ?>
    </div>



<!-- Block to delete a cat -->
    <div id='delete'>

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["delete"])) {
            $catdelete = $_POST['delete'];
            $req = "DELETE FROM category where id=('$catdelete');";
            mysqli_query($conn, $req);
        } ?>
        <form id="deleteForm" method="POST" action="cat_manage.php">
            <label for="branddelete">Entrez l'id de la catégorie à supprimer</label>
            <input type="text" id="branddelete" name="delete" value='' required />
            <input class="btn" type="submit" name="submit"  value="Valider" />
            </p>
        </form>
        <?php require "visu_product.php" ?>
    </div>

    <script src="script.js"></script>
</body>

</html>