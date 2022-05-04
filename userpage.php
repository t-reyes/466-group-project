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
                $rows = $rs->fetch(PDO::FETCH_BOTH);
                echo "<p>User Information</p>";
                // make table
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
                
                // update user info
                echo "<p>Update User Info</p>";
                echo "<form action=\"userChanges.php\" method=\"POST\">"
                echo "Email: <input type = \"text\" value = \"$rows[2]\" name = \"Email\">";
                echo "Address: <input type = \"text\" value = \"$rows[3]\" name = \"Address\">";
                echo "City: <input type = \"text\" value = \"$rows[4]\" name = \"City\">";
                echo "State: <input type = \"text\" value = \"$rows[5]\" name = \"State\">";
                echo "Zip: <input type = \"text\" value = \"$rows[6]\" name = \"Zip\">";
                echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\">";
                echo "</form>"
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>