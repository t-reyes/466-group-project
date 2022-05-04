<html>
    <head><title>Shopping Cart</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $user = $_POST["userid"];
                $sql = "SELECT *
                        FROM CART
                        WHERE USERID = '$user'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC);   
                echo "Shopping Cart";
                //make table
                echo "<table border = 1 cellspacing = 1>";
                echo "<tr>";
                foreach($rows[0] as $key => $item){
                    echo "<th>$key</th>";
                }
                echo "</tr>";
                foreach($rows as $row){
                    echo "<tr>";
                    foreach($row as $key => $item){
                        echo "<td>$item</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                // remove things from cart
                foreach($rows as $row){
                    foreach ($row as $key => $item) {
                        echo "<form action=\"itemRemoval.php\" method=\"POST\">";
                        echo "<label for=\"Item\">$item Quantity: </label>";
                        echo "<input type = \"number\" name = \"Quantity\"/>";
                        echo "<input type=\"submit\" value=\"Remove\"/>";
                        echo "<input type = \"hidden\" name = \"Item\" value =\"$item\"/>";
                        echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\">";
                        echo "</form>";
                    }
                }
                echo "<form action = \"checkoutpage.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Checkout\"/>";
                echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\">";
                echo "</form>";
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>