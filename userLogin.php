<html>
<head>
    <title>User Login</title>
    <meta charset="UTF-8">
</head>
<?php
if(isset($_POST['submit'])){
    try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=z1905494";
        $pdo = new PDO($dsn, 'z1905494', '2000Apr04');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT COUNT(USERNAME) FROM USERS WHERE USERNAME = '$username'";

        $rs = $pdo->query($sql);
        $row = $rs->fetch(PDO::FETCH_BOTH);

        if($row[0] == 1){
            $sql = "SELECT PASSWORD
                    FROM USERS
                    WHERE USERNAME = '$username';";

            $rs = $pdo->query($sql);
            $rows = $rs->fetch(PDO::FETCH_BOTH);

            if($rows[0] == $password){
                echo "<body onload=\"document.forms[0].submit()\">";
                echo "<form action=\"products.php\" method=\"POST\">";   #add action link to products page
                echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
                echo "<input tpye=\"hidden\" name=\"password\" value=\"$password\">"; 
                echo "</form>";
            }
            else{
                echo "<body>";
                echo "<p>Password Incorrect</p>";
                echo "<form action=\"\" method=\"POST\">";
                echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
                echo "<input type=\"text\" name=\"password\" placeholder=\"Password\">";
                echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
                echo "</form>";
            }
        }
        else{
            echo "<body>";
            echo "<p>Username Incorrect</p>";
            echo "<form action=\"\" method=\"POST\">";
            echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
            echo "<input type=\"text\" name=\"password\" placeholder=\"Password\">";
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
    echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
    echo "<input type=\"text\" name=\"password\" placeholder=\"Password\">";
    echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
    echo "</form>";

}
?> 
</body>       
</html>