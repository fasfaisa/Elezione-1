<?php
session_start();
function redirect(): void
{
    $parts = explode("@", $_SESSION["user"]);
    if ($parts[1] === "admin") {
        include_once "../app/view/contact.php";
    } elseif ($parts[1] === "organizer") {
        include_once "../app/view/org_dashboard.php";
    } elseif ($parts[1] === "voter") {
        include_once "../app/view/voter_dashboard.php";
    }else{
        header("Location: /logout");
        exit();
    }
}

if (isset($_SESSION["user"])) {
    redirect();
} else {
    global $is_logged;
    include_once "../app/model/process/login_token_process.php";
    if ($is_logged){
        redirect();
    }else{
        header("Location: /login");
        exit();
    }
}



