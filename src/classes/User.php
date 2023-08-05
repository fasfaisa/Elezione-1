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
    private $userId = 3;
    private $userType;
    private $verificationCode = "fcswfgveg";
    private $verificationStatus = "verified";

    public function __construct($name, $email, $password, $accType, $userType)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->accType = $accType;
        $this->userType = $userType;
    }

    public function register($connection)
    {
        $query = "insert into user values(?,?,?,?,?,?,?,?)";
        try {

            $pstmt = $connection->prepare($query);
            $pstmt->bindValue(1, $this->userId);
            $pstmt->bindValue(2, $this->name);
            $pstmt->bindValue(3, $this->password);
            $pstmt->bindValue(4, $this->accType);
            $pstmt->bindValue(5, $this->email);
            $pstmt->bindValue(6, $this->verificationCode);
            $pstmt->bindValue(7, $this->verificationStatus);
            $pstmt->bindValue(8, $this->userType);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            return $result > 0;
        } catch (PDOException $ex) {
            die("Error : " . $ex->getMessage());
        }

    }

}