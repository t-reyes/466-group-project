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

    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';

    echo "USERID = " . $userid;

    if ($userid) {
        $prepared = $pdo->prepare("SELECT * FROM ORDERS  WHERE USERID = $userid ORDER BY ORDERSTATUS;");
        $prepared->execute();
        $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
        $orderids = draw_table($rows, 'ORDERS');

        $rows_orders = array();
        foreach ($orderids as $orderid) {
            $prepared = $pdo->prepare("SELECT * FROM FULFILLMENT  WHERE ORDERID = $orderid;");
            $prepared->execute();
            $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
            $rows_orders = array_merge($rows_orders, $rows);
        }
        if ($rows_orders)
            draw_table($rows_orders, 'FULFILLMENT');
    }
    else {
        echo "No userid.";
    }
}
catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
function draw_table($rows, $table) {
    // format display to specified table
    switch ($table) {
        case "ORDERS":
            $orderids = array();
            $last_status = '';
            $total_sum = 0;
            foreach($rows as $row) {
                $curr_status = $row["ORDERSTATUS"];
                $total_sum += $row["TOTAL"];
                if ($curr_status == "SHIPPED")
                    array_push($orderids, $row["ORDERID"]);

                if ($last_status != $curr_status) {
                    echo "</table><br><h3>$curr_status</h3><table>";
                    echo "<th>" . "ORDERID" . "</th><th>" . "USERID" . "</th><th>" . "SADDRESS" . "</th><th>" . "SCITY" . "</th><th>" . "SSTATE" . "</th><th>" . "SZIP" . "</th><th>" . "TOTAL" . "</th><th>" . "ORDERSTATUS" . "</th><th>" . "TRACKINGID" . "</th>\n";
                }

                echo "<tr>";
                echo "<td>" . $row["ORDERID"] . "</td><td>" . $row["USERID"] . "</td><td>" . $row["SADDRESS"] . "</td><td>" . $row["SCITY"] . "</td><td>" . $row["SSTATE"] . "</td><td>" . $row["SZIP"] . "</td><td>" . $row["TOTAL"] . "</td><td>" . $row["ORDERSTATUS"] . "</td><td>" . $row["TRACKINGID"] . "</td>\n";
                echo "</tr>";
                $last_status = $curr_status;
            }
            echo "</table><br>";
            echo "Total Sum: $" . number_format($total_sum, 2);
            return $orderids;
            break;
        case "FULFILLMENT":
            echo "<br><h3>Fulfilled Orders</h3><table>";
            echo "<th>" . "ORDERID" . "</th><th>" . "COMMENTS" . "</th>\n";
            foreach($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row["ORDERID"] . "</td><td><p>" . $row["COMMENTS"] . "</p></td>\n";
                echo "</tr>";
            }
            echo "</table>";
            break;
        }
}
?>
</body>
</html>
<style>