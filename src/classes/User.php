<?php

namespace Elezione\classes;

use PDO;
use PDOException;

class User
{

    private $name;
    private $email;
    private $password;
    private $accType;
    private $userType;
    private $verificationCode;
    private string $verificationStatus = "Unverified";

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '_construct' . $numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    public function _construct1($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function _construct6($name, $email, $password, $accType, $userType, $verificationCode)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->accType = $accType;
        $this->userType = $userType;
        $this->verificationCode = $verificationCode;
    }

//    check user entered email already have in our database
    public function is_new_user($connection)
    {
        $query = "select * from user where email = ?";
        try {
            $pstmt = $connection->prepare($query);
            $pstmt->bindValue(1, $this->email);
            $pstmt->execute();
            $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            return empty($result);
        } catch (PDOException $ex) {
            die("Error occurred : " . $ex->getMessage());
        }
    }

    public function is_verified($connection)
    {
        $query = "select userID , verificationStatus from user where verificationCode = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $this->verificationCode);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_OBJ);

        if (!(empty($result))) {
            if ($result->verificationStatus === "Unverified") {
                $new_query = "update user set verificationStatus = 'Verified' where userID = ?";
                $pstmt = $connection->prepare($new_query);
                $pstmt->bindValue(1, $result->userID);
                $pstmt->execute();
                return 1;
            }
            if($result->verificationStatus === "Verified") {
                return 2;
            }

        }
        return 3;
    }

//    register function
    public function register($connection, $email_connection)
    {

        $query = "insert into user (name , password , accountType , email , verificationCode , verificationStatus , userType ) values(?,?,?,?,?,?,?)";
        try {

            $pstmt = $connection->prepare($query);
            $pstmt->bindValue(1, $this->name);
            $pstmt->bindValue(2, $this->password);
            $pstmt->bindValue(3, $this->accType);
            $pstmt->bindValue(4, $this->email);
            $pstmt->bindValue(5, $this->verificationCode);
            $pstmt->bindValue(6, $this->verificationStatus);
            $pstmt->bindValue(7, $this->userType);
            $pstmt->execute();

//          send verification email
            $email_connection->addAddress($this->email, $this->name);
            $email_connection->Subject = "Verify your Elezione account";
            $email_connection->Body = "Hi " . $this->name . " ,\n\nPlease verify your Elezione account using this link.\n\nhttp://localhost:8080/verification?verify=" . $this->verificationCode;

            $email_connection->send();

            return true;
        } catch (PDOException $ex) {
            die("Registration Error : " . $ex->getMessage());
        }

    }

}