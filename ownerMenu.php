<html>
    <head><title>Owner Menu</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                echo "<form action=\"employeeList.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Employee List\">";
                echo "</form>";

                echo "<form action=\"ownerInventory.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Inventory\">";
                echo "</form>";

                echo "<form action=\"view_ordered_emp_list.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Orders\">";
                echo "</form>";




            }     
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
    </pre></body>
</html>