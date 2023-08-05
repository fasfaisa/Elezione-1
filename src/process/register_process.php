<?php
require_once "src/classes/DBConnector.php";
require_once "src/classes/User.php";

use Elezione\classes\DBConnector;
use Elezione\classes\EmailConnector;
use Elezione\classes\User;

//connection create
$con = DBConnector::getConnection();
$email_con = EmailConnector::getEmailConnection();

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
            echo array_search($variable,$variable_array);
            exit();
        }
    }

    if(!filter_var(strip_tags(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)){
        echo 4;
        exit();
    }

    if(strlen(strip_tags(trim($_POST["password"]))) < 6){
        echo 5;
        exit();
    }

    if(!password_verify(strip_tags(trim($_POST["conf_password"])) ,
        password_hash(strip_tags(trim($_POST["password"])) , PASSWORD_BCRYPT))){
        echo 6;
        exit();
    }

    $voter_name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $password = password_hash(strip_tags(trim($_POST["password"])) , PASSWORD_BCRYPT);

    $user = new User($voter_name , $email , $password , "free" , "voter" ,password_hash($email ,PASSWORD_BCRYPT));

    if(!($user->is_new_user($con))){
        echo 7;
        exit();
    }

    if($user->register($con , $email_con)){
       echo "success";
    }else{
        echo "error";
    }
    exit();


}

if (isset($_POST["organization"])) {
    $org_name = $_POST["org_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_password = $_POST["conf_password"];

} else {
    echo "error";
}

