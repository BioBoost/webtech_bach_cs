<?php
include("User.php");    
class PrivilegedUser extends User {
    private $privilegeLevel;

    // GET Methods
    public function getPriviledgeLevel() {
        return $this->privilegeLevel;
    }

    // SET Methods
    public function setPriviledgeLevel($privlevel) {
        $this->privilegeLevel = $privlevel;
    }

    // Constructor
    public function __construct($un, $passhash, $email, $id, $privlevel = -1) {
        // Call parent constructor
        parent::__construct($un, $passhash, $email, $id);
        $this->privilegeLevel = $privlevel;
    }

    // Override the tostring method of the parent class
    public function __toString() {
        return parent::__toString() . " | Privilege level: " . $this->privilegeLevel;
    }
}
?>