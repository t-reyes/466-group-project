<!DOCTYPE html>
<html lang="en">
<head>
<title>View Order Status</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/color.css">
</head>
<body>
<?php
error_reporting(E_ALL);
include('dblogininfo_TOM.php');
try {
    $dsn = "mysql:host=courses;dbname=$db_username";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $userid = isset($_POST['userid']);
    $userid = 1;

    $prepared = $pdo->prepare("SELECT * FROM ORDERS  WHERE USERID = $userid;");
    $prepared->execute();
    $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
    draw_table($rows, 'ORDERS');
}
catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
function draw_table($rows, $table) {
    echo "<table>";
    // format display to specified table
    echo "<th>" . "ORDERID" . "</th><th>" . "USERID" . "</th><th>" . "SADDRESS" . "</th><th>" . "SCITY" . "</th><th>" . "SSTATE" . "</th><th>" . "SZIP" . "</th><th>" . "TOTAL" . "</th><th>" . "ORDERSTATUS" . "</th><th>" . "TRACKINGID" . "</th>\n";
    foreach($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row["ORDERID"] . "</td><td>" . $row["USERID"] . "</td><td>" . $row["SADDRESS"] . "</td><td>" . $row["SCITY"] . "</td><td>" . $row["SSTATE"] . "</td><td>" . $row["SZIP"] . "</td><td>" . $row["TOTAL"] . "</td><td>" . $row["ORDERSTATUS"] . "</td><td>" . $row["TRACKINGID"] . "</td>\n";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
<style>