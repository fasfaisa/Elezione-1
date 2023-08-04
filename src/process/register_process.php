<?php

require_once "src/classes/DBConnector.php";
use Elezione\classes\DBConnector;

use Elezione\classes\User;
//use classes\DBConnector;
$con = DBConnector::getConnection();

?>

<!DOCTYPE html>
<head><title>Login</title></head>
<body>
<?php
if (isset($_POST["voter"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_password = $_POST["conf_password"];
    include "src/classes/User.php";
//    $uregister =new User($name, $email, $password, $conf_password);
//
//    $uregister->regVoter($name, $email, $password, $conf_password);
//    header("Location: ../register.php?error=none");
    $uregister = new User($name, $email, $password, $conf_password);

    $uregister->regUser();
    header("Location: ../register?error=none");

}
if (isset($_POST["organization"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_password = $_POST["conf_password"];

    include "./src/classes/User.php";
    $uregister = new User($name, $email, $password, $conf_password);
    $uregister->regUser();


    header("Location: ../register?error=none");

}?>
</body>