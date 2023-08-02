<?php

require_once "src/classes/DBConnector.php";
use Elezione\classes\DBConnector;
$con = DBConnector::getConnection();
?>

<!DOCTYPE html>
<head><title>Login</title></head>
<body>
<?php
//example code for you
$query = "select * from user";
try {
    $stmt = $con->query($query);
    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $row) {
        echo "success";
    }
    if(empty($rs)){
        echo "empty";
    }
}catch (PDOException $ex){
    die("Error : ".$ex->getMessage());
}
?>
</body>