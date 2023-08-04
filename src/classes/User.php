<?php

namespace Elezione\classes;
use Elezione\classes\DBConnector;

class User
{

    private $name;
    private $email;
    private $password;
    private $conf_password;

    public function __construct($name, $email, $password, $conf_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->conf_password = $conf_password;
    }

    public function regUser()
    {
        if (!$this->emptyInputs()) {
            header("Location: register?error=emptyInputs");
            exit();
        }
        if (!$this->invalidMail()) {
            header("Location: register?error=email");
            exit();
        }
        if (!$this->pwdMatch()) {
            header("Location: register?error=passwordMatch");
            exit();
        }
        if (!$this->idTakenCheck()) {
            header("Location: register?error=emailorPasswordTaken");
            exit();
        }
        $this->setUser($this->name, $this->email, $this->password);
    }

    private function emptyInputs(): bool
    {
        $result = null;
        if (empty($this->email) || empty($this->name) || empty($this->password) || empty($this->conf_password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidMail(): bool
    {
        $result = null;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(): bool
    {
        $result = null;
        if ($this->password !== $this->conf_password) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function idTakenCheck(): bool
    {
        $result = null;
        if (!$this->checkUser($this->email, $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }



    protected function setUser($name, $email, $password): void
    {
        $dbcon = new DBConnector();
        $con = $dbcon->getConnection();

        $insert_data="INSERT INTO user (name,email,password) VALUES (?,?,?) ";

        $hashpw = password_hash($password, PASSWORD_BCRYPT);
        $pstmt = $con->prepare($insert_data);

        $pstmt->bindValue(1,$name);
        $pstmt->bindValue(2,$email);
        $pstmt->bindValue(3,$password);


        $pstmt->execute(array($name, $email, $hashpw));
        if ($pstmt) {

            header("Location: register?error=stmt_failed");
            exit();
        }

    }

    protected function checkUser($email, $password): bool
    {

        $dbcon = new DBConnector();
        $con = $dbcon->getConnection();
        $insert_data = "SELECT userID FROM user WHERE email =? OR password =? ";
        $pstmt = $con->prepare($insert_data);
        $pstmt->execute(array($email, $password));
        if ($pstmt) {
            header('Location:register');
            exit();
            if ($pstmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }
        }            return $resultCheck;

    }


}