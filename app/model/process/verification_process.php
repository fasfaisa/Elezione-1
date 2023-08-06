<?php

use Elezione\model\classes\DBConnector;
use Elezione\model\classes\User;

//connection create
$con = DBConnector::getConnection();
if (isset($_GET["verify"])) {
    if (!empty($_GET["verify"])) {
        $user = new User($_GET["verify"]);
        if (($user->is_verified($con))) {
            echo "Confirm Your Email<br/>Thank you! Your email has been confirmed successfully.";
        } else {
            echo "Invalid verification link.";
        }
    } else {
        echo "Invalid verification link.";
    }
} else {
    header("Location: error");
}
