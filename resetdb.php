<!--
THIS IS SO YOU DON'T HAVE GO ONTO MARIA DB TO RESET THE DATABASE
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset Database</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/color.css">
</head>
<body>
THIS IS SO YOU DON'T HAVE GO ONTO MARIA DB TO RESET THE DATABASE</br>
<div id="Reset">
    <b>Reset Database</b>
    <form action="resetdb.php" method="POST">
        <input type="hidden" name="reset" value="1"/>
        <input type="submit" value="reset"/>
    </form>
</div>
<?php
error_reporting(E_ALL);
include('dblogininfo_TOM.php');
try {
    $dsn = "mysql:host=courses;dbname=$db_username";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $reset = isset($_POST['reset']) ? $_POST['reset'] : '';
    if($reset) {
        $sql = file_get_contents("database.sql");
        $prepared = $pdo->prepare($sql);
        $prepared->execute();
        echo "Successfully reset the database.";
    }
}
catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body>
</html>