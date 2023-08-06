<?php

namespace Elezione\model\classes;

use PDOException;

class Organization extends User
{
    private $package;
    private $pollCount;
    private $renewDate;
    private $validatePayment;

    public function __construct($name, $email, $password, $userType, $verificationCode, $package)
    {
        parent::__construct($name, $email, $password, $userType, $verificationCode);
        $this->package = $package;
        if ($package === "silver") {
            $this->pollCount = 1;
        } elseif ($package === "gold") {
            $this->pollCount = 5;
        } else {
            $this->pollCount = 20;
        }
        //  get date after 7 days
        $date = date('Y/m/d');
        $date = date("Y/m/d", strtotime("$date +7 day"));
        $this->renewDate = $date;
        $this->validatePayment = 0;
    }

    public function register($connection, $email_connection)
    {
        if (parent::register($connection, $email_connection)) {
            $query = "insert into organization (packagetype , pollCount , validatePayment , userID , paymentRenewDate) values(?,?,?,?,?)";
            try {
                $pstmt = $connection->prepare($query);
                $pstmt->bindValue(1, $this->package);
                $pstmt->bindValue(2, $this->pollCount);
                $pstmt->bindValue(3, $this->validatePayment);
                $pstmt->bindValue(4, $this->getuserID($connection));
                $pstmt->bindValue(5, $this->renewDate);
                $pstmt->execute();

                return true;
            } catch (PDOException $ex) {
                die("Registration Error : " . $ex->getMessage());
            }
        }
    }
}
