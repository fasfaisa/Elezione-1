<?php
session_start();
if (isset($_SESSION["user"])) {
    $parts = explode("@", $_SESSION["user"]);
    if ($parts[1] === "admin") {
        include_once "../app/view/contact.php";
    } elseif ($parts[1] === "organizer") {
        include_once "../app/view/org_dashboard.php";
    } elseif ($parts[1] === "voter") {
        include_once "../app/view/voter_dashboard.php";
    }
} else {
    header("Location: login");
    exit();
}



