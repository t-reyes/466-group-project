<html>
    <head><title>Checkout</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $user = $_POST["user"];
                $sql = "SELECT *
                        FROM CART
                        WHERE USERID = $user";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC); 
                
                echo "<p>Payment Information</p>";
                $sql = "SELECT EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                        FROM USERS
                        WHERE USERNAME = $user";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC); 
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }

        ?>
    </pre></body>
</html>