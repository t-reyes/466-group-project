<html><head><title>Item Removed</title></head><body><pre>
<?php 
    include('dblogininfo_TOM.php');
    try {
        $dsn = "mysql:host=courses;dbname=$db_username";
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $product = $_POST["Item"];
        $qty = $_POST["Quantity"];
        $n = $pdo->exec("UPDATE CART, PRODUCTS 
                        SET QUANTITY = QUANTITY - $qty 
                        WHERE PRODUCTS.PRODID = '$product' AND CART.PRODNAME = '$product';");
        echo "Item Removed, Return to Cart?";
        
        echo "<form action = \"shoppingcart.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Return to Cart\"/>";
        echo "</form>";
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
    }
?> 
</pre></body></html>