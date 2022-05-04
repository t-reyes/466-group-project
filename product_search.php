<html>
<head>
    <title>Product Search</title>
    <meta charset="UTF-8">
</head><body><pre>

<?php

include("dblogininfo_TOM.php");

try { // if something goes wrong, an exception is thrown
    $dsn = "mysql:host=courses;dbname=$db_username";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM PRODUCTS";
    $rs = $pdo->query($sql);
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

    echo "<form action=\"product_info.php\" method=\"POST\">";
    echo "<label for=\"prodName\">Select a product:</label> <select name=\"prodName\" id=\"prodName\">";
            echo "<option value='default'></option>";
        foreach($rows as $row) {
            $name = $row['PRODNAME'];
            echo "<option value='$name'>$name</option>";
        }
        // echo "<option value=\"default\" selected></option>";
    echo "</select><input type=\"submit\" name=\"submit\" value=\"Go to Product Detail\"/>";
    echo "</form>";

}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>

</pre></body></html>