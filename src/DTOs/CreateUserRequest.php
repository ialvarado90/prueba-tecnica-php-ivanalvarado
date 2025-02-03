<?php

namespace App\DTOs;

class CreateUserRequest
{
    private  $name;
    private  $email;
    private  $password;
    private  $phonenumber;

    public function __construct($name,  $email,  $password, $phonenumber)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phonenumber = $phonenumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhoneNumber()
    {
        return $this->phonenumber;
    }
}
