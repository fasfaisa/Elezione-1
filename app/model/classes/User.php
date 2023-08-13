<?php

namespace Elezione\model\classes;
session_start();

use PDO;
use PDOException;

class User
{

    private $name;
    private $email;
    private $password;
    private $userType;
    private $verificationCode;
    private $verificationStatus = "Unverified";
    private $userID;

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '_construct' . $numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    public function _construct1($verificationCode): void
    {
        $this->verificationCode = $verificationCode;
    }

    public function _construct0(): void
    {
    }

    public function _construct5($name, $email, $password, $userType, $verificationCode): void
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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

    public function is_verified($connection): bool
    {
        $query = "select userID , verificationStatus from user where verificationCode = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $this->verificationCode);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_OBJ);

        if (!(empty($result)) && $result->verificationStatus === "Unverified") {
            $new_query = "update user set verificationStatus = 'Verified' ,verificationCode = null  where userID = ?";
            $pstmt = $connection->prepare($new_query);
            $pstmt->bindValue(1, $result->userID);
            $pstmt->execute();
            return true;
        }
        return false;
    }

    //    register function
    public function register($connection, $email_connection)
    {

        $query = "insert into user (name , password , email , verificationCode , verificationStatus , userType ) values(?,?,?,?,?,?)";
        try {

            $pstmt = $connection->prepare($query);
            $pstmt->bindValue(1, $this->name);
            $pstmt->bindValue(2, $this->password);
            $pstmt->bindValue(3, $this->email);
            $pstmt->bindValue(4, $this->verificationCode);
            $pstmt->bindValue(5, $this->verificationStatus);
            $pstmt->bindValue(6, $this->userType);
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

    public function login($connection, $email, $password, $remember): int
    {
        $query = "select userID , verificationStatus , password , userType from user where email = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $email);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if (password_verify($password, $result->password)) {
            if ($result->verificationStatus === "Verified") {
                $_SESSION["user"] = $result->userID."@".$result->userType;
                if($remember){
                    $token = password_hash($email.time() , PASSWORD_BCRYPT);
                    $query = "update user set loginToken = ? where userID = ?";
                    $pstmt = $connection->prepare($query);
                    $pstmt->bindValue(1,$token);
                    $pstmt->bindValue(2,$result->userID);
                    $pstmt->execute();
                    setcookie("login_token" , $token , time() + (30 * 24 * 60 * 60) , "/"); // for 30 days
                }
                return 0;
            }
            if ($result->verificationStatus === "Unverified") {
                return 1;
            }
        }
        return 2;
    }

    public function logout($connection ,$token): void
    {
        $query = "update user set loginToken = NULL where loginToken = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $token);
        $pstmt->execute();
    }

    public function loadData($connection , $userId): void
    {
        $query = "select *  from user where userID = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $userId);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        $this->userID = $userId;
        $this->name = $result->name;
        $this->password = $result->password;
        $this->email =$result->email;
        $this->verificationStatus = $result->verificationStatus;
        $this->userType = $result->userType;
    }

    public function loginWithCookie($connection , $token): bool
    {
        $query = "select userID , userType  from user where loginToken = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $token);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if($result === 0){
            return false;
        }
        $_SESSION["user"] = $result->userID."@".$result->userType;
        return true;
    }

    public function updateEmail($connection , $email , $userID): void
    {
        $query = "update user set email = ? where userID = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $email);
        $pstmt->bindValue(2, $userID);
        $pstmt->execute();
    }
    public function updateName($connection , $name , $userID): void
    {
        $query = "update user set name = ? where userID = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $name);
        $pstmt->bindValue(2, $userID);
        $pstmt->execute();
    }

    public function updatePassword($connection , $password , $userID): void
    {
        $query = "update user set password = ? where userID = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $password);
        $pstmt->bindValue(2, $userID);
        $pstmt->execute();
    }

    public function changeToOrganizer($connection , $package , $poll , $user , $renew): void
    {
        $query = "insert into organization (packagetype , pollCount , userID , paymentRenewDate) values(?,?,?,?)";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $package);
        $pstmt->bindValue(2, $poll);
        $pstmt->bindValue(3, $user);
        $pstmt->bindValue(4, $renew);
        $pstmt->execute();

        $query = "update user set userType = ? where userID =?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, "organizer");
        $pstmt->bindValue(2, $user);
        $pstmt->execute();
        $_SESSION["user"] = $user."@"."organizer";
    }

    public function changeAccountStatus($connection , $user): void
    {
        $query = "update user set verificationStatus = ? where userID =?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, "Deleted");
        $pstmt->bindValue(2, $user);
        $pstmt->execute();
    }

    /**
     * getters
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function getVerificationStatus(): string
    {
        return $this->verificationStatus;
    }

    public function getUserID($connection)
    {
        $query = "select userID from user where email = ?";
        $pstmt = $connection->prepare($query);
        $pstmt->bindValue(1, $this->email);
        $pstmt->execute();
        return $pstmt->fetch(PDO::FETCH_OBJ)->userID;
    }

    public function getPassword()
    {
        return $this->password;
    }


}
