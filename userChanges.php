<html><head><title>Details Changed</title></head><body><pre>
<?php 
    include('dblogininfo_TOM.php');
    try {
        $dsn = "mysql:host=courses;dbname=$db_username";
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $user = $_POST["userid"];
        $email = $_POST["Email"];
        $address = $_POST["Address"];
        $city = $_POST["City"];
        $state = $_POST["State"];
        $zip = $_POST["Zip"];
        $n = $pdo->exec("UPDATE USERS
                        SET EMAIL = $email, BADDRESS = $address, BCITY = $city, BSTATE = $state, BZIP = $zip
                        WHERE USERID = '$user';");
        echo "Details Changed, Return to Account Page?";
        
        echo "<form action = \"userpage.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Return to Account\"/>";
        echo "</form>";
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
    }
?> 
</pre></body></html>