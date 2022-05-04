<html>
<head>
    <title>Product Search</title>
    <meta charset="UTF-8">
</head><body><pre>
<?php
include("dblogininfo_TOM.php");
if(isset($_POST['prodName'])){
    try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=$db_username";
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $prodName = $_POST['prodName'];
        $sql = "SELECT * FROM PRODUCTS WHERE PRODNAME = '$prodName'";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC); 

        if($rows) {
            draw_table($rows);
            echo "<form action=\"shoppingcart.php\"  method=\"POST\">";
            echo "<label for=\"quantity\">QTY:</label> <select name=\"quantity\" id=\"quantity\">";
            echo "<option value='default'></option>";
            foreach($rows as $row) {
                $quantity = $row['QUANTITY'];
                for ($i = 1; $i < $quantity + 1; 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$i++) {
                    echo "<option value='$i'>$i</option>";
                }
            }
            echo "</select><input type=\"submit\" name=\"submit\" value=\"Add to Shopping Cart\"/>";
            echo "</form>";
            
        }
        else {
            echo "Cannot find product.";
        }
        
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
    }
}

function draw_table($rows) {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";
    foreach($rows[0] as $key => $item) {
        echo"<th>$key</th>";
    }
    echo "</tr>";
    foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $item) {
            echo "<td>$item</td>\n";
        }
        echo "</tr>"; 
    }
    echo "</table>\n\n";
}
?>



</pre></body></html>