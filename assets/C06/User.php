<?php
class User
{
    // Read-only Properties
    private $id;
    private $username;

    // Read/Write Properties
    private $passhash;
    private $email;

    // GET Methods
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getPasshash() { return $this->passhash; }
    public function getEmail() { return $this->email; }

    // SET Methods
    public function setPasshash($passhash) { $this->passhash = $passhash; }
    public function setEmail($email) { $this->email = $email; }

    // Constructor
    // public function __construct($id, $un, $passhash, $email)
    // {
    //     $this->id = $id;
    //     $this->username = $un;
    //     $this->passhash = $passhash;
    //     $this->email = $email;
    // }

    // Constructor
    public function __construct($un, $passhash, $email, $id = 0)
    {
        $this->username = $un;
        $this->passhash = $passhash;
        $this->email = $email;
        $this->id = $id;
    }

    // Overriden __toString method
    public function __toString()
    {
        return "Username: " . $this->username
                . " | Password: " . $this->passhash
                . " | E-mail: " . $this->email;
    }

    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = "";
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randomString;
    }

    public function generateRandomPasshash()
    {
        $this->passhash = hash("sha256", $this->generateRandomString(100), false);
    }
}

?>