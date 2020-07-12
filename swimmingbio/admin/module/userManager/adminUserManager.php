<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userManager
 *
 * @author dumidu
 */
class adminUserManager {

    public function adduser($email, $fname, $password, $lname, $type) {
        try {

            $userDao = new userDao();
            return $userDao->addUser($email, $fname, $password, $lname, $type);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getUsers($type) {
        try {

            $userDao = new userDao();
            return $userDao->getUsers($type);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getUserTypes() {
        try {

            $userDao = new userDao();
            return $userDao->getUserTypes();
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteUser($id) {
        try {

            $userDao = new userDao();
            return $userDao->deleteUser($id);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getUserData($id) {
        try {

            $userDao = new userDao();
            return $userDao->getUserData($id);
        } catch (Exception $e) {
            return false;
        }
    }

    public function editUser($email, $fname, $password, $lname, $type) {
        try {

            $userDao = new userDao();
            return $userDao->editUser($email, $fname, $password, $lname, $type);
        } catch (Exception $e) {
            return false;
        }
    }

}

?>
