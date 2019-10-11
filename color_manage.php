<?php require_once 'conn.php' ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Color Chaustore Management</title>
</head>

<body>
    <h1>Color Chaustore Management</h1>
    <div id="nav">
    <a href="chaustore.php"><input type="button" value="Accueil" /></a>
    <input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>
    </div>
    <form method="POST" action="">

        <input id="visu_btn" name="visualiser" type="button" value="Visualiser">
        <input id="add_btn" name="ajouter" type="button" value="Ajouter">
        <input id="mod_btn" name="modifier" type="button" value="Modifier">
        <input id="delete_btn" name="supprimer" type="button" value="Supprimer">
    </form>

    <div id='visu'><?php require_once "visu_color.php" ?></div>
    <!-- Visulation on all version modifiy !!  -->
 
    <!-- Block to Add a color -->
    <div id='add'> 

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["coloradd"])) {
            $colorname = $_POST['coloradd'];
            $req = "INSERT INTO color (name) VALUES ('$colorname');";
            mysqli_query($conn, $req);
        } ?>
        <form id="addForm" method="POST" action="color_manage.php">
            <label for="coloradd">Ajouter une couleur </label>
            <input type="text" id="coloradd" name="coloradd" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_color.php" ?>
    </div>






<!-- Block to modify a color -->
    <div id='mod'>
        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["color"])) {
            $colormod = $_POST['color'];
            $idcolor = $_POST['id'];
            $req = "UPDATE `color` SET `name`=('$colormod') WHERE  `id`=('$idcolor');";
            mysqli_query($conn, $req);
        } ?>
        <form id="modForm" method="POST" action="color_manage.php">
            <label for="colorid">Entre l'ID de la couleur à modifier</label>
            <input type="text" id="catid" placeholder="ID to modify" name="id" value='' />
            <label for="colormod">Modifier le nom d'une couleur</label>
            <input type="text" id="colormod" placeholder="New Brand name" name="color" value='' />
            <input class="btn" type="submit" name="submit" value="Valider" />
            </p>
        </form>
        <?php require "visu_color.php" ?>
    </div>



<!-- Block to delete a cat -->
    <div id='delete'>

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["deleteColor"])) {
            $colordelete = $_POST['deleteColor'];
            $req = "DELETE FROM color where id=('$colordelete');";
            mysqli_query($conn, $req);
        } ?>
        <form id="deleteForm" method="POST" action="color_manage.php">
            <label for="colordelete">Entrez l'id de la couleur à supprimer</label>
            <input type="text" id="colordelete" name="deleteColor" value='' required />
            <input class="btn" type="submit" name="submit"  value="Valider" />
            </p>
        </form>
        <?php require "visu_color.php" ?>
    </div>

    <script src="script.js"></script>
</body>

</html>