<?php
    
class Usuario {

    private $id;
    private $name;
    private $email;
    private $password;
    private $accountNonExpired;
    private $credentialsNonExpired;
    private $enabled;
    private $roles = array();

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNome($name) {
        $this->name = $name;
    } 

    public function getName() {
        return $this->name;
    } 

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }

    public function getRoles() {
        return $this->roles;
    }

    public function setAccountNonExpired($accountNonExpired) {
        $this->accountNonExpired = $accountNonExpired;
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function setCredentialsNonExpired($credentialsNonExpired) {
        $this->credentialsNonExpired = $credentialsNonExpired;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function setEnabled($enabled) {
        $this->enabled = $enabled;
    }

    public function isEnabled() {
        return true;
    }
}