<html>
    <head><title>Shopping Cart</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            include('test_web_pages.html');
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
                drawTable($rows);

                // remove things from cart
                foreach($rows as $row){
                    foreach ($row as $key => $item) {
                        echo "<form action=\"http://students.cs.niu.edu/~z1925687/itemRemoval.php\" method=\"POST\">";
                        echo "<label for=\"part\">$item Quantity: </label>";
                        echo "<input type = \"number\" name = \"Quantity\"/>";
                        echo "<input type=\"submit\" value=\"Remove\"/>";
                        echo "<input type = \"hidden\" name = \"Item\" value =\"$item\"/>";
                        echo "</form>";
                    }
                }
                echo "<form action = http://students.cs.niu.edu/~z1925687/checkoutpage.php" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Checkout\"/>";
                echo "</form>";
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>