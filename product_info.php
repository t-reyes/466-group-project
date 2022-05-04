<html>
<head>
    <title>Product Search</title>
    <meta charset="UTF-8">
</head><body><pre>
<?php
include("dblogininfo_TOM.php");
if(isset($_POST['search'])){
    try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=$db_username";
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $search = $_POST['search'];
        $sql = "SELECT PRODNAME, DESCRIPTION, PRICE, STATUS FROM PRODUCTS WHERE PRODNAME = '$search'";
        
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $search, PDO::PARAM_STR);
        $statement->execute();

        $rows = $statement->fetchAll(PDO::FETCH_ASSOC); 

        if($rows) {
            draw_table($rows);
        }
        else {
            echo "Cannot find product.";
        }
        
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
    }
}

function draw_table($rows) {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";
    foreach($rows[0] as $key => $item) {
        echo"<th>$key</th>";
    }
    echo "</tr>";
    foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $item) {
            echo "<td>$item</td>\n";
        }
        echo "</tr>"; 
    }
    echo "</table>\n\n";
}
?>



</pre></body></html>