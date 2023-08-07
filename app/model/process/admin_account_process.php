<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login");
    exit();
}

$userID = explode("@", $_SESSION["user"])[0];
