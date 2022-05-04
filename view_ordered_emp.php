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
    $orderid = isset($_POST['orderid']) ? $_POST['orderid'] : '';
    $fulfill = isset($_POST['fulfill']) ? $_POST['fulfill'] : '';

    echo "<form action=\"view_ordered_emp_list.php\" method=\"POST\">";
        echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\"/>";
        echo "<button type=\"submit\">Back</button>";
    echo "</form>";

    // echo "EMPID = " . $empid . "</br>";
    // echo "ORDERID = " . $orderid . "</br>";

    if ($fulfill) {
        // echo "Fulfill = " . $fulfill . "</br>";
        $prepared = $pdo->prepare("UPDATE ORDERS SET ORDERSTATUS=? WHERE ORDERID=?;");
        $prepared->execute(['SHIPPED', $orderid]);


        $prepared = $pdo->prepare("INSERT INTO FULFILLMENT (ORDERID, EMPID, COMMENTS) VALUES (?, ?, ?);");
        $prepared->execute([$orderid, $empid, $fulfill]);
        echo "Successfully fulfilled the order.";
    }
    else if ($empid && $orderid){
        $prepared = $pdo->prepare("SELECT * FROM ORDERS WHERE ORDERID = $orderid AND ORDERID NOT IN (SELECT ORDERID FROM FULFILLMENT);");
        $prepared->execute();
        $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            draw_table($rows, 'ORDERS');
            echo "Order comments";
            echo "<form action=\"view_ordered_emp.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"empid\" value=\"$empid\"/>";
                echo "<input type=\"hidden\" name=\"orderid\" value=\"$orderid\"/>";
                echo "<input type=\"text\" name=\"fulfill\" value=\"None\"/>";
                echo "<button type=\"submit\">Fulfill Order</button>";
            echo "</form><br>";

            foreach($rows as $row) {
                $userid = $row["USERID"];
            }

            $prepared = $pdo->prepare("SELECT * FROM USERS WHERE USERID = ?;");
            $prepared->execute([$userid]);
            $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row) {
                $custname = $row["USERNAME"];
                $custemail = $row["EMAIL"];
            }

            echo "Contact $custname via Email<br>";
            echo "<a href=\"mailto:$custemail\">$custemail</a><br>";

            echo "<br>etc<br>";
        }
        else {
            echo "This order has already been fulfilled.";
        }
    }
    else {
        echo "You are unauthorized to use this page.";
    }
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