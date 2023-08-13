<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

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
$user = new User();
$user->loadData(DBConnector::getConnection() , $userID);
$username = $user->getName();
$email = $user->getEmail();


if (isset($_POST["setting"]) && $_POST["setting"] === "basic"){
    if (isset($_POST["name"], $_POST["email"])){
        if (empty(strip_tags(trim($_POST["name"]))) || !filter_var(strip_tags(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)){
            echo "error";
            exit();
        }
        $name = strip_tags(trim($_POST["name"]));
        $email = strip_tags(trim($_POST["email"]));

        $user->updateEmail(DBConnector::getConnection() , $email , $userID);
        $user->updateName(DBConnector::getConnection() , $name , $userID);
    }

    if (isset($_POST["password"] , $_POST["newpassword"] ,$_POST["conf_password"])){
        $cur_password = strip_tags(trim($_POST["password"]));
        $newpassword = strip_tags(trim($_POST["newpassword"]));
        $conf_password = strip_tags(trim($_POST["conf_password"]));

        if ($newpassword === $conf_password && password_verify($cur_password , $user->getPassword())){
            $user->updatePassword(DBConnector::getConnection() , password_hash($newpassword , PASSWORD_BCRYPT) , $userID);
            echo "success";
            exit();
        }
    }elseif (!empty($_POST["password"]) || !empty($_POST["newpassword"]) || !empty($_POST["conf_password"])) {
        echo "error";
        exit();
    }
    echo "success";
}

if (isset($_POST["setting"]) && $_POST["setting"] === "advanced"){
    if (isset($_POST["package-type"], $_POST["adv-password"])){
        if (empty(strip_tags(trim($_POST["package-type"])))){
            echo "error";
            exit();
        }
        $package = strip_tags(trim($_POST["package-type"]));
        $password = strip_tags(trim($_POST["adv-password"]));
        $poll = 1;
        $time = date('Y/m/d');
        $time = date("Y/m/d", strtotime("$time +7 day"));
        if ($package === "platinum") {
            $poll = 20;
        } elseif ($package === "gold") {
            $poll = 5;
        }

        if (password_verify($password , $user->getPassword())) {

            $user->changeToOrganizer(DBConnector::getConnection(), $package, $poll, $userID, $time);
            echo "success";
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }
}

if (isset($_POST["setting"]) && $_POST["setting"] === "danger"){
    $user->changeAccountStatus(DBConnector::getConnection() , $userID);
    echo "success";
}