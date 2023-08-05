<?php
session_start();
require_once "src/classes/DBConnector.php";
require_once "src/classes/User.php";

use Elezione\classes\DBConnector;
use Elezione\classes\User;

//connection create
$con = DBConnector::getConnection();

/** @ Error codes
 * voter registration
 * 0 - empty name
 * 1 - empty email
 * 2 - empty password
 * 3 - empty confirm password
 * 4 - wrong email
 * 5 - password less than 6 characters
 * 6 - password and confirm password mismatch
 * 7 - email already registered
 */


if (isset($_POST["voter"])) {

    $variable_array = array("name", "email", "password", "conf_password");
    foreach ($variable_array as $variable) {
        if (empty(strip_tags(trim($_POST[$variable])))) {
            $_SESSION['register_errors'] =  array_search($variable,$variable_array);
            header("Location: register");
            exit();
        }
    }

    if(!filter_var(strip_tags(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)){
        $_SESSION['register_errors'] =  4;
        header("Location: register");
        exit();
    }

    if(strlen(strip_tags(trim($_POST["password"]))) < 6){
        $_SESSION['register_errors'] =  5;
        header("Location: register");
        exit();
    }

    if(!password_verify(strip_tags(trim($_POST["conf_password"])) ,
        password_hash(strip_tags(trim($_POST["password"])) , PASSWORD_BCRYPT))){
        $_SESSION['register_errors'] =  6;
        header("Location: register");
        exit();
    }

    $voter_name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $password = password_hash(strip_tags(trim($_POST["password"])) , PASSWORD_BCRYPT);

    $user = new User($voter_name , $email , $password , "free" , "voter");

    if($user->register($con)){
        header("Location: login");
        exit();
    }
    header("Location: register");
    exit();

} elseif (isset($_POST["organization"])) {
    $org_name = $_POST["org_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_password = $_POST["conf_password"];

//    $uregister = new User($name, $email, $password, $conf_password);
//    $uregister->regUser();


} else {
    header("Location: register");
}

