<?php require_once 'conn.php' ?>
<?php
//requête SQL:
$sql2 = 'select product_id, size_id, stock from stock ;'; 

//exécution de la requête:
$request2 = mysqli_query($conn, $sql2);

echo "<table id='tab'>";

//affichage des données:
while ($result2 = mysqli_fetch_array($request2)) {
    echo "
       <tr>
           <th>{$result2['product_id']}</th>
           <th>{$result2['size_id']}</th>
           <th>{$result2['stock']}</th>
       </tr>";
}


