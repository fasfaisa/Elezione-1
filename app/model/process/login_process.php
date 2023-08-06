<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

$con = DBConnector::getConnection();
$remember = false;

if (empty(strip_tags(trim($_POST["email"])))) {
    echo 0;
    exit();
}
if (empty(strip_tags(trim($_POST["password"])))) {
    echo 1;
    exit();
}

if (isset($_POST["remember"]) && strip_tags(trim($_POST["remember"])) === "remember") {
    $remember = true;
}

if (!filter_var(strip_tags(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)) {
    echo 2;
    exit();
}
$email = strip_tags(trim($_POST["email"]));

$user = new User();
$status = $user->login($con, $email, strip_tags(trim($_POST["password"])), $remember);
if ($status === 0) {
    echo "success";
} elseif ($status === 1) {
    echo 3;
} elseif ($status === 2) {
    echo 2;
}
