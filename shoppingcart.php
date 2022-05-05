<html>
    <head><title>Shopping Cart</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $user = isset($_POST['userid']) ? $_POST['userid'] : '';
                $prodid = isset($_POST['prodid']) ? $_POST['prodid'] : '';
                $qty = isset($_POST['quantity']) ? $_POST['quantity'] : '';
                
                echo "<form action=\"userpage.php\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"userid\" value=\"$user\"/>";
                    echo "<button type=\"submit\">My Account</button>";
                echo "</form>";

                if ($prodid && $qty) {
                    try {
                            $prepared = $pdo->prepare("INSERT INTO CART (USERID, PRODID, QUANTITY) VALUES (?, ?, ?);");
                            $prepared->execute([$user, $prodid, $qty]);

                            // $prepared = $pdo->prepare("UPDATE PRODUCTS SET QUANTITY=QUANTITY-? WHERE PRODID=?;");
                            // $prepared->execute([$qty, $prodid]);

                            echo "Successfully added to cart.\n";
                    }
                    catch(PDOexception $e) {
                        echo "ERROR: You already have this product in cart.\n";
                    }

                }
                
                $sql = "SELECT PRODUCTS.PRODNAME, CART.QUANTITY
                        FROM CART, PRODUCTS, USERS
                        WHERE USERS.USERID = '$user' AND CART.USERID = USERS.USERID AND PRODUCTS.PRODID = CART.PRODID";
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

                $sql = "SELECT PRODUCTS.PRODNAME
                        FROM CART, PRODUCTS, USERS
                        WHERE USERS.USERID = '$user' AND CART.USERID = USERS.USERID AND PRODUCTS.PRODID = CART.PRODID";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC); 
                // remove things from cart 
                foreach($rows as $row){
                    foreach ($row as $key => $item) {
                        echo "<form action=\"itemRemoval.php\" method=\"POST\">";
                        echo "<label for=\"Item\">$item Quantity: </label>";
                        echo "<input type = \"number\" name = \"Quantity\"/>";
                        echo "<input type=\"submit\" value=\"Remove\"/>";
                        echo "<input type = \"hidden\" name = \"Item\" value =\"$item\"/>";
                        echo "<input type=\"hidden\" name=\"userid\" value=\"$user\">";
                        echo "</form>";
                    }
                }
                echo "<form action = \"checkoutpage.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Checkout\"/>";
                echo "<input type=\"hidden\" name=\"userid\" value=\"$user\">";
                echo "</form>";
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>