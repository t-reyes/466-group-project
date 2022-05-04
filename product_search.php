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
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>

<form action="product_info.php" method="POST">
    <input type="text" placeholder="Search..." id="search" name="search">
    <button type="submit" value="Submit">Submit</button>
</form>


</pre></body></html>