<html>
    <head><title>User Account</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            include('test_web_pages.html');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $user = $_POST["userid"];
                $sql ="SELECT USERNAME, EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                       FROM USERS
                       WHERE USERNAME = '$user'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetch(PDO::FETCH_BOTH);
                echo "<p>User Information</p>";
                drawTable($rows);
                

                echo "<p>Update User Info</p>";
                echo "<form action=\"userChanges.php\" method=\"POST\">"
                echo "<input type = \"text\" value = \"$rows[2]\" name = \"Email\">Email: </input>";
                echo "<input type = \"text\" value = \"$rows[3]\" name = \"Address\">Address: </input>";
                echo "<input type = \"text\" value = \"$rows[4]\" name = \"City\">City: </input>";
                echo "<input type = \"text\" value = \"$rows[5]\" name = \"State\">State: </input>";
                echo "<input type = \"text\" value = \"$rows[6]\" name = \"Zip\">Zip: </input>";
                echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\">";
                echo "</form>"
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>