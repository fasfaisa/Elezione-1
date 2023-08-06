<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\EmailConnector;
use Elezione\model\classes\Organization;
use Elezione\model\classes\User;

//connection create
$con = DBConnector::getConnection();
$email_con = EmailConnector::getEmailConnection();

/** @ Error codes
 *
 * 0 - empty name
 * 1 - empty email
 * 2 - wrong package
 * 3 - empty password
 * 4 - empty confirm password
 * 5 - wrong email
 * 6 - password less than 6 characters
 * 7 - password and confirm password mismatch
 * 8 - email already registered
 */


if (isset($_POST["voter"]) || isset($_POST["organization"])) {

    $variable_array = array("name", "email", "package", "password", "conf_password");
    foreach ($variable_array as $variable) {
        if (empty(strip_tags(trim($_POST[$variable])))) {
            echo array_search($variable, $variable_array);
            exit();
        }
    }

    if (!filter_var(strip_tags(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)) {
        echo 5;
        exit();
    }

    if (strlen(strip_tags(trim($_POST["password"]))) < 6) {
        echo 6;
        exit();
    }

    if (!password_verify(
        strip_tags(trim($_POST["conf_password"])),
        password_hash(strip_tags(trim($_POST["password"])), PASSWORD_BCRYPT)
    )) {
        echo 7;
        exit();
    }

    $voter_name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $password = password_hash(strip_tags(trim($_POST["password"])), PASSWORD_BCRYPT);

    //for votes
    if (isset($_POST["voter"])) {
        $user = new User($voter_name, $email, $password, "voter", preg_replace('/[^a-zA-Z0-9]/m', '', password_hash($email, PASSWORD_BCRYPT)));

        if (!($user->is_new_user($con))) {
            echo 8;
            exit();
        }

        if ($user->register($con, $email_con)) {
            echo "success";
        } else {
            echo "error";
        }
    }

    //for organizers
    if (isset($_POST["organization"])) {
        if (!in_array(strip_tags(trim($_POST["package"])), ["silver", "gold", "platinum"], true)) {
            echo 2;
            exit();
        }
        $package = strip_tags(trim($_POST["package"]));
        $organizer = new Organization($voter_name, $email, $password, "organizer", preg_replace('/[^a-zA-Z0-9]/m', '', password_hash($email, PASSWORD_BCRYPT)), $package);

        if (!($organizer->is_new_user($con))) {
            echo 8;
            exit();
        }

        if ($organizer->register($con, $email_con)) {
            echo "success";
        } else {
            echo "error";
        }
    }
    exit();
}

echo "error";
