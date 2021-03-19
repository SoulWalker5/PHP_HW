<?php


namespace models;


class User
{
    private $email;
    private $firstname;
    private $password;

    public function __construct($email, $firstname, $password)
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->password = $password;
    }

    public function getData()
    {
        return ['email' => $this->email, 'firstname' => $this->firstname, 'password' => $this->password];
    }
}