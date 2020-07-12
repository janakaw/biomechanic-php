<?php

//require_once 'conn.php';

class user {

    private $userId;
    private $email;
    private $password;
    private $type;
    private $name;

    /**
     * constructer of the class.
     *
     * @return void
     */
    public function __construct($email) {
        try {
            //loading the user data
            $userDaoObj = new userDao();
            $user = $userDaoObj->getUserByEmail($email);
            $this->setUserId($user['ID']);
            $this->setEmail(stripcslashes($user['EMAIL']));
            $this->setPassword($user['PASSWORD']);
            $this->setUserType($user['USER_ROLE_ID']);
            $this->setName($user['FIRST_NAME']);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
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

    public function setUserType($type) {
        $this->type = $type;
    }

    public function getUserType() {
        return $this->type;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

?>
