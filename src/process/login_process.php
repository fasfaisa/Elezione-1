<?php

require_once "src/classes/DBConnector.php";
use Elezione\classes\DBConnector;

$con = DBConnector::getConnection();
?>

<!DOCTYPE html>
<head><title>Login</title></head>
<body>
<?php
// Check if the form was submitted
if (isset($_POST["login"])) {
    // Get the user's input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con,$sql);
    $user=mysqli_fetch_array($result,MYSQLI_ASSOC);

    if ($user){
        if (password_verify($password, $user["password"])) {
            // Password is correct, login successful
            header("Location: index.php");
            die();
        } else {
            // Invalid credentials
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>
</body>
