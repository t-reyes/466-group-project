<html>
<head><title>Checkout Complete</title></head>
<body onload="document.forms[0].submit()">
<?php
include('dblogininfo_TOM.php');
try {
    $dsn = "mysql:host=courses;dbname=$db_username";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $userid = $_POST['userid'];
    $saddress = $_POST['address'];
    $scity = $_POST['city'];
    $sstate = $_POST['state'];
    $szip = $_POST['zip'];
    $total = $_POST['total'];
    $tracking = rand(1,99999999);

    $sql = "INSERT INTO ORDERS
                (USERID, SADDRESS, SCITY, SSTATE, SZIP, TOTAL, ORDERSTATUS, TRACKINGID)
                VALUES ('$userid', '$saddress', '$scity', '$sstate', '$szip', '$total', 'PROCESSING', '$tracking')";
    
    $pdo->exec($sql);

    $sql = "DELETE FROM CART WHERE USERID = '$userid';"

    $pdo->exec($sql);

    echo "<form action=\"view_ordered_cust.php\" method=\"POST\">";
    echo "<input type=\"hidden\" name=\"userid\" value=\"$userid\">";
    echo "</form>";
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body>
</html>