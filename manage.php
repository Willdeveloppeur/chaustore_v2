<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Chaustore Management</title>
</head>

<body>
    <h1>Chaustore Management</h1>
    <a href="index.php"><input type="button" value="Accueil" /></a>
    <input type="button" onclick='window.location.reload(false)' value="Rafraichir" />

    <form method="POST" action="">

        <!-- <input id="visu_btn" name="visualiser" type="button" value="Visualiser"> -->

        <input id="add_btn" name="ajouter" type="button" value="Ajouter">

        <input id="mod_btn" name="modifier" type="button" value="Modifier">

        <input id="delete_btn" name="supprimer" type="button" value="Supprimer">
    </form>

    <?php require_once 'product.php' ?>

</body>

</html>