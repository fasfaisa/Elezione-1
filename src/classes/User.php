<?php

namespace Elezione\classes;

use PDO;
use PDOException;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
$mail->isMail();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Username = "projectelezione@gmail.com";
$mail->Password = "ProjectElezione";

class User
{

    private $name;
    private $email;
    private $password;
    private $accType;
    private $userType;
    private $verificationCode;
    private string $verificationStatus = "Unverified";

    public function __construct($name, $email, $password, $accType, $userType, $verificationCode)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->accType = $accType;
        $this->userType = $userType;
        $this->verificationCode = $verificationCode;
    }

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

    public function register($connection)
    {
        global $mail;
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

            $mail->setFrom("projectelezione@gmail.com", "Elezione");
            $mail->addAddress($this->email, $this->name);

            $mail->Subject = "Verify your Elezione account";
            $mail->Body = "Hi , ".$this->name."!\n\n Please verify your account using this link.\n\n
            http://localhost:8080?verify=".$this->verificationCode;

            $mail->send();

            return true;
        } catch (PDOException $ex) {
            die("Registration Error : " . $ex->getMessage());
        } catch (Exception $ex) {
            echo $ex;
            exit();
        }

    }

}