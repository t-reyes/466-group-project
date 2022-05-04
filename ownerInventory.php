<html>
<head>
    <title>Inventory</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/color.css">
</head>
<body>
<?php
include('dblogininfo_TOM.php');
try { // if something goes wrong, an exception is thrown
    $dsn = "mysql:host=courses;dbname=$db_username";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $empid = $_POST['empid'];

    if($_POST['addprod'] == '0'){
        $prodname = $_POST['prodname'];
        $price = $_POST['price'];
        $catagory = $_POST['catagory'];
        $desc = $_POST['desc'];
        $quantity = $_POST['quantity'];
        if($quantity <= 0){
            $status = 0;
        }
        else{
            $status = 1;
        }
        
        $sql = "INSERT INTO PRODUCTS
                    (PRODNAME, PRICE, CATAGORY, DESCRIPTION, QUANTITY, STATUS)
                    VALUES ('$prodname', $price, '$catagory', '$desc', $quantity, $status);";

        $pdo->exec($sql);

            
        $sql = "SELECT * FROM PRODUCTS";
        
        $rs = $pdo->query($sql);
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>Inventory</p>";
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

        echo "<br><p>New Product Added</p><br>";

        echo "<form action=\"\" method=\"POST\">";
        echo "<input type=\"text\" name=\"prodname\" placeholder=\"Product Name\"><br>";
        echo "<input type=\"number\" name=\"price\" placeholder=\"Price\"><br>";
        echo "<input type=\"text\" name=\"catagory\" placeholder=\"Catagory\"><br>";
        echo "<input type=\"text\" name=\"desc\" placeholder=\"Description\"><br>";
        echo "<input type=\"number\" name=\"quantity\" placeholder=\"Quantity\"><br>";
        echo "<input type=\"submit\" name=\"submit\" value=\"Add Item\">";
        echo "<input type=\"hidden\" name=\"addprod\" value=\"0\">";
    }
    else{          
        $sql = "SELECT * FROM PRODUCTS";
        
        $rs = $pdo->query($sql);
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>Inventory</p>";
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

        echo "<form action=\"\" method=\"POST\">";
        echo "<input type=\"text\" name=\"prodname\" placeholder=\"Product Name\"><br>";
        echo "<input type=\"number\" name=\"price\" placeholder=\"Price\"><br>";
        echo "<input type=\"text\" name=\"catagory\" placeholder=\"Catagory\"><br>";
        echo "<input type=\"text\" name=\"desc\" placeholder=\"Description\"><br>";
        echo "<input type=\"number\" name=\"quantity\" placeholder=\"Quantity\"><br>";
        echo "<input type=\"submit\" name=\"submit\" value=\"Add Item\">";
        echo "<input type=\"hidden\" name=\"addprod\" value=\"0\">";
    }
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage(); 
}
?> 
</body>       
</html>