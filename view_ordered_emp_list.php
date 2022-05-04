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

    $empid = isset($_POST['empid']) ? $_POST['empid'] : '';
    $rows = '';

    echo "<form action=\"\" method=\"POST\">";
        echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\"/>";
        echo "<button type=\"submit\">Back</button>";
    echo "</form>";

    if ($empid) {
        $prepared = $pdo->prepare("SELECT * FROM EMPLOYEES WHERE EMPID = $empid;");
        $prepared->execute();
        $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($rows) {
        // echo "EMPID = " . $empid;

        $prepared = $pdo->prepare("SELECT * FROM ORDERS WHERE ORDERID NOT IN (SELECT ORDERID FROM FULFILLMENT);");
        $prepared->execute();
        $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
        draw_table($rows, 'ORDERS', $empid);
    }
    else {
        echo "You are unauthorized to use this page.";
    }
}
catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
function draw_table($rows, $table, $empid) {
    echo "<table>";
    // format display to specified table
    echo "<th>" . "ORDERID" . "</th><th>" . "ORDERSTATUS" . "</th><th>" . "TRACKINGID" . "</th><th></th>\n";
    foreach($rows as $row) {
        $oid = $row["ORDERID"];
        echo "<tr>";
        echo "<td>" . $oid . "</td><td>" . $row["ORDERSTATUS"] . "</td><td>" . $row["TRACKINGID"] . "</td><td>";
        echo "<form action=\"view_ordered_emp.php\" method=\"POST\">";
            echo "<input type=\"hidden\" name=\"orderid\" value=\"$oid\"/>";
            echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\"/>";
            echo "<button type=\"submit\">To Fulfillment Page.</button>";
        echo "</form>";
        echo "</td>\n";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
<style>