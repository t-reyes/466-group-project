<html>
<head>
    <title>Product Search</title>
    <meta charset="UTF-8">
</head><body><pre>
<?php
include("dblogininfo_TOM.php");
$prodid = isset($_POST['prodid']) ? $_POST['prodid'] : '';
if($prodid){
    try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=$db_username";
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
        $prodid = isset($_POST['prodid']) ? $_POST['prodid'] : '';

        $sql = "SELECT * FROM PRODUCTS WHERE PRODID = '$prodid'";
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
                for ($i = 1; $i < $quantity + 1; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            }
            echo "</select><input type=\"submit\" value=\"Add to Shopping Cart\"/>";
                echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\"/>";
                echo "<input type=\"hidden\" name=\"prodid\" value=\"$prodid\"/>";
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