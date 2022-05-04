<html>
    <head><title>Employee List</title></head>
    <body><pre>
        <?php
            include('dblogininfo_TOM.php');
            try {
                $dsn = "mysql:host=courses;dbname=$db_username";
                $pdo = new PDO($dsn, $db_username, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sql="SELECT * FROM EMPLOYEES";
                $rs=$pdo->query($sql);
                $rows =$rs->fetchAll(PDO::FETCH_ASSOC);

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
    </pre>
<a href="ownerMenu.php">Back</a></body>
</html>