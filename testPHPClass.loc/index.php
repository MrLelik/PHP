<?php

class Lelik
{
    private $username;
    private $data = array();

    public function __get($name)
    {
        if ($name == "username") {
            return $this->username;
        } else {
            if (array_key_exists($name, $this->data)) {
                return $this->data[$name];
            } else {
                return null;
            }
        }
    }

    public function __set($name, $value)
    {
        if ($name == "username") {
            $this->username = $value;
        } else {
            $this->data[$name] = $value;
        }
    }
}

$lelik = new Lelik();
$lelik->username = "my name is lelik";
$lelik->location = "Kharkov";
$lelik->language = "PHP";
echo $lelik->username . "<br>";
echo $lelik->location . "<br>";
echo $lelik->language . "<br>";



class User
{
    public $username = "";
    private $loggedIn = false;

    public function login()
    {
        $this->loggedIn = true;
    }

    public function logout()
    {
        $this->loggedIn = false;
    }

    public function isLoggedIn()
    {
        return $this->loggedIn;
    }
}

class Admin extends User
{
    public function createForum($forumName)
    {
        echo "$this->username created a new forum: $forumName<br>";
    }

    public function banMember($member)
    {
        echo "$this->username banned the meber: $member->username<br>";
    }
}

$user1 = new User();
$user1->username = "LELIK";
$user1->login();
echo $user1->username . " is " . ($user1->isLoggedIn() ? "logged in" : "logged out") . "<br>";

$admin = new Admin();
$admin->username = "Moci4ka";
$admin->login();
echo $admin->username . " is " . ($user1->isLoggedIn() ? "logged in" : "logged out") . "<br>";

$admin->createForum("Go Go Go");
$admin->banMember($member);