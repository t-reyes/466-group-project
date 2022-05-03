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
                $sql = "SELECT PRODUCT.PRODNAME CART.QUANTITY 
                        FROM CART USERS PRODUCT
                        WHERE USERS.USERID = '$userid' AND CART.PRODID = PRODUCT.PRODID";
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
                
                echo "<p>Payment Information</p>";
                $sql = "SELECT EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                        FROM USERS
                        WHERE USERNAME = '$userid'";
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
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }

        ?>
    </pre></body>
</html>