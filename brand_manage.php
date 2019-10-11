<?php require_once 'conn.php' ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Chaustore BRAND Management</title>
</head>

<body>
    <h1>Chaustore Brand Management</h1>
    <a href="chaustore.php"><input type="button" value="Accueil" /></a>
    <input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>

    <form method="POST" action="">

        <input id="visu_btn" name="visualiser" type="button" value="Visualiser">
        <input id="add_btn" name="ajouter" type="button" value="Ajouter">
        <input id="mod_btn" name="modifier" type="button" value="Modifier">
        <input id="delete_btn" name="supprimer" type="button" value="Supprimer">
    </form>

    <div id='visu'><?php require_once "visu_brand.php" ?></div>
    <!-- Visulation on all version modifiy !!  -->
 
    <!-- Block to Add a brand -->
    <div id='add'> 

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["brand"])) {
            $brandname = $_POST['brand'];
            $req = "INSERT INTO brand (name) VALUES ('$brandname');";
            mysqli_query($conn, $req);
        } ?>
        <form id="addForm" method="POST" action="brand_manage.php">
            <label for="brandadd">Ajouter une marque </label>
            <input type="text" id="brandadd" name="brand" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_brand.php" ?>
    </div>



<!-- Block to modify a brand -->
    <div id='mod'>
        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["mod"])) {
            $brandmod = $_POST['mod'];
            $idbrand = $_POST['idbrand'];
            $req = "UPDATE `brand` SET `name`=('$brandmod') WHERE  `id`=('$idbrand');";
            mysqli_query($conn, $req);
        } ?>
        <form id="modForm" method="POST" action="brand_manage.php">
            <label for="brandid">Entre l'ID de la marque à modifier</label>
            <input type="text" id="brandid" placeholder="ID to modify" name="idbrand" value='' />
            <label for="brandmod">Modifier le nom d'une Marque</label>
            <input type="text" id="brandmod" placeholder="New Brand name" name="mod" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_brand.php" ?>
    </div>



<!-- Block to delete a brand -->
    <div id='delete'>

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["delete"])) {
            $branddelete = $_POST['delete'];
            $req = "DELETE FROM brand where id=('$branddelete');";
            mysqli_query($conn, $req);
        } ?>
        <form id="deleteForm" method="POST" action="brand_manage.php">
            <label for="branddelete">Entrez l'id du produit à supprimer</label>
            <input type="text" id="branddelete" name="delete" value='' required />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_brand.php" ?>
    </div>

    <script src="script.js"></script>
</body>

</html>