<html>
    <head><title>Checkout</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $userid = $_POST["userid"];
                $sql = "SELECT PRODUCTS.PRODNAME, CART.QUANTITY, PRODUCTS.PRICE 
                        FROM CART, USERS, PRODUCTS
                        WHERE USERS.USERID = '$userid'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
                $total = 0;
                $rowTotal = 0; 
                
                echo "<p>Cart</p>";
                echo "<table border=1 cellspacing=1>";
                echo "<tr>";
                foreach($rows[0] as $key => $item){
                    echo "<th>$key</th>";
                }
                echo "</tr>";
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>$row[PRODNAME]</td>";
                    echo "<td>$row[QUANTITY]</td>";
                    $rowtotal = $row['QUANTITY'] * $row['PRICE'];
                    $total = $total + $rowtotal;
                    echo "<td>\$$rowtotal</td>";
                    echo "</tr>";
                }
                    echo "<tr>";
                    echo "<th>TOTAL</th>";
                    echo "<td> </td>";
                    echo "<th>\$$total</th>";
                    echo "</tr>";
                echo "</table>";
                
                echo "<p>Payment Information</p>";
                $sql = "SELECT EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                        FROM USERS
                        WHERE USERID = '$userid'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<table border=1 cellspacing=1>";
                echo "<tr>";
                foreach($rows[0] as $key => $item){
                    echo "<th>$key</th>";
                }
                echo "</tr>";
                foreach ($rows as $row) {
                    echo "<tr>";
                    foreach($row as $key => $item){
                        echo "<td>$item</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                
                echo "<p>Enter Shipping Address and Credit Card</p>";
                echo "<form action=\"createorder.php\" method=\"POST\">";
                echo "<input type=\"text\" name=\"card\" placeholder=\"Credit Card\"><br>";
                echo "<input type=\"text\" name=\"address\" placeholder=\"Address\">";
                echo "<input type=\"text\" name=\"city\" placeholder=\"City\"><br>";
                echo "<input type=\"text\" name=\"state\" placeholder=\"State\">";
                echo "<input type=\"text\" name=\"zip\" placeholder=\"Zip Code\"><br>";
                echo "<input type=\"submit\" name=\"submit\" value=\"Place Order\">";
                echo "</form>";
            }     
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>