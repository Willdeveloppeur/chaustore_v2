<?php require_once 'conn.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Simplon chaustore Management</title>
</head>

<body>
    <h1> Gestionnaire Chaustore</h1>
    <button type="button" value="Retour" action="simplon_chaustore_v2.php">Retour</button>
    <div id='delete'>

        <?php
        if (!empty($_POST["submit"]) && !empty($_POST["del_product"])) {
            $deleteProd = $_POST['del_product'];
            $deleteStock = "DELETE stock FROM stock WHERE product_id = ('$deleteProd');";
            $req = "DELETE FROM product where id=('$deleteProd');";
            
            mysqli_query($conn, $deleteStock);
            mysqli_query($conn, $req);
        }


        ?>
        <form id="deleteForm" method="POST" action="">
            <label for="del_product">Entrez l'id du produit à supprimer</label>
            <input type="text" id="del_product" name="del_product" value='' required />
            <input id="btn" type="submit" name="submit" onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){return true;}else{return false;}" value="Valider" />
            </p>
        </form>


        <?php
        //requête SQL:
        $sql = "SELECT category.name as category, product.id, brand.name AS brand, color.name AS color, product.image, product.price, product.gender, product.name
        FROM product 
INNER JOIN brand ON product.brand_id = brand.id 
INNER JOIN color ON product.color_id = color.id 
INNER JOIN category ON product.category_id = category.id
ORDER BY product.id ";
        $stock = "SELECT sum(stock) FROM stock WHERE product_id = id from product;";
        //exécution de la requête:
        $request = mysqli_query($conn, $sql);
        $request2 = mysqli_query($conn, $stock);
        echo "<table id='tab'>
<thead>
						<tr>
							<th>n°</th>
							<th>Nom du produit</th>
							<th>Couleur</th>
							<th>Categorie</th>
							<th>Marque</th>
							<th>Prix</th>
                            <th>Genre</th>
                            <th>size</th>
							
						</tr>";

        //affichage des données:
        while ($result = mysqli_fetch_array($request)) {
            echo "
       <tr>
           <td>{$result['id']}</td>
           <td>{$result['name']}</td>
           <td>{$result['color']}</td>
           <td>{$result['category']}</td>
           <td>{$result['brand']}</td>
           <td>{$result['price']}</td>
           <td>{$result['gender']}</td>
           <td></td>
       </tr>";
        }
       
        ?>



        <script src="script.js"></script>
</body>

</html>