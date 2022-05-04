<html>
    <head><title>Owner Menu</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $empid = $_POST['empid'];
                
                echo "<form action=\"employeeList.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Employee List\">";
                echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\">";
                echo "</form>";

                echo "<form action=\"ownerInventory.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Inventory\">";
                echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\">";
                echo "<input type=\"hidden\" name=\"addprod\" value=\"nothing\">";
                echo "</form>";

                echo "<form action=\"view_ordered_emp_list.php\" method=\"POST\">";
                echo "<input type=\"submit\" value=\"Orders\">";
                echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\">";
                echo "</form>";
            }     
            catch(PDOexception $e) { // handle that exception
                echo "Connection to database failed: " . $e->getMessage();
            }
        ?>
<a href="employeeLogin.php">Log out</a>
        </pre></body>
</html>