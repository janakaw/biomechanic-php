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
class userManager {

    public function adduser($email, $fname, $password, $lname, $type) {
        try {

            $userDao = new userDao();
            $id = $userDao->addUser($email, $fname, $password, $lname, $type);
            $login = new login();
            return $login->checkLogin($email, $password);
            
        } catch (Exception $e) {
            return false;
        }
    }



}

?>
