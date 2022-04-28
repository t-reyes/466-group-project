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
        $password = $_Post['password'];
        
        $sql = "SELECT USERNAME, PASSWORD
                    FROM USERS
                    WHERE USERNAME = '$username';";

        $rs = $pdo->query($sql);
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

        try{
            foreach($row as $rows){
                if($row[PASSWORD] == $password){
                    echo "<body onload=\"document.forms[0].submit()\">";
                    echo "<form action=\"products.php\" method=\"POST\">";   #add action link to products page
                    echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
                    echo "<input tpye=\"hidden\" name=\"password\" value=\"$password\">"; 
                    echo "</form>";
                }
                else{
                ?>
                    <body>
                    <p>Username or Password Incorrect</p>
                    <form action="" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="password" placeholder="Password">
                    <input type="submit" name="submit" value="Login">
                    </form>
                <?
                }
            }
        }
        catch{
        ?>
            <body>
            <p>Username or Password Incorrect</p>
            <form action="" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login">
            </form>
        <?
        }
    }
    catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
    } 
    }
    else{
?>
    <body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
<?
    }
?> 
</body>       
</html>