<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

$con = DBConnector::getConnection();

if(isset($_COOKIE["login_token"])){
    $token = $_COOKIE["login_token"];
    $user = new User();
    if (!$user->login_with_cookie($con , $token)){
        header("Location: ");
        exit();
    }
}