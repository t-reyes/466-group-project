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
    $tracking = rand(1,99999999);

    
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body>
</html>