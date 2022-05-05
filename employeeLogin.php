<html>
<head>
    <title>Employee Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/color.css">
</head>
<?php
if(isset($_POST['submit'])){
    try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=z1905494";
        $pdo = new PDO($dsn, 'z1905494', '2000Apr04');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $empID = $_POST['empID'];
        
        $sql = "SELECT COUNT(EMPID), ISOWNER FROM EMPLOYEES WHERE EMPID = '$empID'";

        $rs = $pdo->query($sql);
        $row = $rs->fetch(PDO::FETCH_BOTH);

        if($row[0] == 1 && $row[1] == 1){
            echo "<body onload=\"document.forms[0].submit()\">";
            echo "<form action=\"ownerMenu.php\" method=\"POST\"><br>";   #add action link to manager page 
            echo "<input type=\"hidden\" name=\"empid\" value=\"$empID\">";
            echo "</form>";
        }
        elseif($row[0] == 1 && $row[1] == 0){
            echo "<body onload=\"document.forms[0].submit()\">";
            echo "<form action=\"view_ordered_emp_list.php\" method=\"POST\">";  
            echo "<input type=\"hidden\" name=\"empID\" value=\"$empID\">";
        }
        else{
            echo "<body>";
            echo "<p>Username Incorrect</p>";
            echo "<form action=\"\" method=\"POST\">";
            echo "<input type=\"text\" name=\"empID\" placeholder=\"Employee ID\"><br>";
            echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
            echo "</form>";
        }
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage(); 
    }
}
else{
    echo "<body>";
    echo "<form action=\"\" method=\"POST\">";
    echo "<input type=\"text\" name=\"empID\" placeholder=\"Employee ID\"><br>";
    echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
    echo "</form>";
}
?> 
<a href="userLogin.php">Click here for User Login</a>
</body>       
</html>