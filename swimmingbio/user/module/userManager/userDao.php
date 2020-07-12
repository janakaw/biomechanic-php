<?php

/**
 * Description of userDao
 *
 * @author dumidu
 */
class userDao {

    public function getUserByEmail($email) {
        try {
            $sql = 'SELECT * FROM user WHERE EMAIL = \'' . $email . '\'';
            $result = @mysql_query($sql);
            $data = @mysql_fetch_assoc($result);
            if ($data) {
                return $data;
            } else {
                return FALSE;
            }
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function addUser($email, $fname, $password, $lname, $type) {
        try {
            $password = md5($password);
            $sql = "INSERT INTO user (USER_ROLE_ID,FIRST_NAME,EMAIL,PASSWORD,LAST_NAME)VALUES('$type','$fname','$email','$password','$lname')";
            $result = @mysql_query($sql);
            return mysql_insert_id();
        } catch (Exception $err) {
            throw $err;
        }
    }

   
}

?>
