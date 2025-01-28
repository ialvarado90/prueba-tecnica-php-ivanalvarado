<?php

namespace App\Entities;

class User
{
    private $nombres;
    private $email;
    private $password;
    private $phonenumber;

    public function __construct($nombres, $email, $password, $phonenumber)
    {
        $this->nombres = $nombres;
        $this->email = $email;
        $this->setPassword($password);
        $this->phonenumber = $phonenumber;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getNombres()
    {
        return  $this->nombres;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return  $this->email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function setPhoneNumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    public function getPhoneNumber()
    {
        return  $this->phonenumber;
    }
}
