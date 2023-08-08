<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

$con = DBConnector::getConnection();

session_start();

// Clear all session data
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroy the session itself
session_destroy();

//remove login cookie
if(isset($_COOKIE["login_token"])){
    $user =  new User();
    $user->logout($con  , $_COOKIE["login_token"]);
    setcookie("login_token", '', time() - 3600, '/');
}

header("Location: login");
exit();