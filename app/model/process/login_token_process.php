<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

$con = DBConnector::getConnection();
$is_logged = false;
if(isset($_COOKIE["login_token"])){
    $token = $_COOKIE["login_token"];
    $user = new User();
    $is_logged = $user->loginWithCookie($con , $token);
}