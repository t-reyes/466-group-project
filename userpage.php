<html>
    <head><title>User Account</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $user = $_POST["userid"];
                $sql ="SELECT USERNAME, EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                       FROM USERS
                       WHERE USERNAME = '$user'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
                echo "<p>User Information</p>";
                drawTable($rows);
                

                echo "<p>Update User Info</p>";
                echo "<form>"
                echo "<input type = \"text\">Email: </input>";
                echo "<input type = \"text\">Address: </input>";
                echo "<input type = \"text\">City: </input>";
                echo "<input type = \"text\">State: </input>";
                echo "<input type = \"text\">Zip: </input>";
                echo "</form>"
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>