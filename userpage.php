<html>
    <head><title>User Account</title></head>
    <br><form action ="userLogin.php" method="POST">
        <input type="submit" value="Logout">
    </form>
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
                       WHERE USERID = '$user'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
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

                $sql ="SELECT USERNAME, EMAIL, BADDRESS, BCITY, BSTATE, BZIP
                       FROM USERS
                       WHERE USERID = '$user'";
                $rs = $pdo->query($sql);
                $rows = $rs->fetch(PDO::FETCH_BOTH);
                
                // update user info
                echo "<p>Update User Info</p>";
                echo "<form action=\"userChanges.php\" method=\"POST\">";
                    echo "Email:   <input type = \"text\" value = \"$rows[1]\" name = \"Email\">\n";
                    echo "Address: <input type = \"text\" value = \"$rows[2]\" name = \"Address\">\n";
                    echo "City:    <input type = \"text\" value = \"$rows[3]\" name = \"City\">\n";
                    echo "State:   <input type = \"text\" value = \"$rows[4]\" name = \"State\">\n";
                    echo "Zip:     <input type = \"text\" value = \"$rows[5]\" name = \"Zip\">\n";
                    echo "<input type=\"hidden\" name=\"userid\" value=\"$user\">\n";
                    echo "<input type=\"submit\" value=\"Submit\">";
                echo "</form>";
                echo "<br><form action = \"product_search.php\" method=\"POST\">";
                    echo "<input type=\"submit\" value=\"View Products\">";
                    echo "<input type=\"hidden\" name=\"userid\" value\"$user\">";
                echo "</form>";
            }
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>