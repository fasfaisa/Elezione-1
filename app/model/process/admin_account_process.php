<?php
session_start();
if (!isset($_SESSION["user"])) {
    global $is_logged;
    include_once "../app/model/process/login_token_process.php";
    if (!$is_logged) {
        header("Location: login");
        exit();
    }
}

$userID = explode("@", $_SESSION["user"])[0];
