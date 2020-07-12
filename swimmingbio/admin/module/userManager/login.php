<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author dumidu
 */
class login {

    public $user;

    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($this->isLogged()) {
            $this->user = new user($_SESSION['adminUser']['userEmail']);
        }
    }

    /**
     * This function find whether current user is logged in to the system
     *
     * @return boolean true if logged else false
     */
    public function isLogged() {
        //return true;
        return (isset($_SESSION['adminUser']) && count($_SESSION['adminUser']));
    }

    /**
     * This function authenticate the user
     *
     * @param string $userName  email of the user
     * @param string $password  password of the user
     * @return boolean true on success false on failure
     * @throws exception on error
     */
    public function checkLogin($userEmail, $password) {
        try {

            //create user object with the curren tuser
            $this->user = new user($userEmail);
            $dbPwd = $this->user->getPassword();
            if ($dbPwd) {
                if (md5($password) == $dbPwd) {
                    $_SESSION['adminUser']['userId'] = $this->user->getUserId();
                    $_SESSION['adminUser']['userEmail'] = $userEmail;
                    $_SESSION['adminUser']['name'] = $this->user->getName();
                    $_SESSION['adminUser']['type'] = $this->user->getUserType();
                    unset ($_SESSION['msg']);
                    return true;
                } else {
                    $_SESSION['msg'] = 'Password is incorrect.';
                    return false;
                }
            } else {
                $_SESSION['msg'] = 'This user not found in the system.';
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * This function log out a user from the system
     *
     * @return true on success false on failure
     */
    public function logout() {

        if (isset($_SESSION['adminUser'])) {
            unset($_SESSION['adminUser']);
        }
        return true;
    }

}

?>
