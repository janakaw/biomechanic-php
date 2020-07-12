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
            return $result;
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function getUsers($type) {
        try {
            $sql = 'SELECT u.ID,ur.NAME AS ROLE,u.FIRST_NAME,u.LAST_NAME,u.EMAIL,u.CREATED_DATE FROM user u
                    LEFT JOIN user_role ur ON u.USER_ROLE_ID = ur.ID
                    WHERE ur.NAME = \'' . $type . '\'';
            if($type==ADMIN_ROLE){
                $sql.=' OR ur.NAME = \'' . SUPER_ADMIN_ROLE . '\'';
            }
            $result = @mysql_query($sql);
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row;
            }
            if ($data) {
                return $data;
            } else {
                return FALSE;
            }
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function getUserTypes() {
        try {
            $sql = 'SELECT * FROM user_role';
            $result = @mysql_query($sql);
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row;
            }
            if ($data) {
                return $data;
            } else {
                return FALSE;
            }
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function deleteUser($id) {
        try {
            $sql = 'DELETE FROM user WHERE ID =' . "$id" . '';
            $result = @mysql_query($sql);
            return $result;
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function getUserData($id) {
        try {
            $sql = 'SELECT u.USER_ROLE_ID,ur.NAME as TYPE,FIRST_NAME,LAST_NAME,EMAIL FROM user u
                    LEFT JOIN user_role ur ON u.USER_ROLE_ID = ur.ID
                    WHERE u.ID = \'' . $id . '\'';
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

    public function editUser($email, $fname, $password, $lname, $type) {
        try {
            $sql = 'UPDATE user SET FIRST_NAME="' . $fname . '",LAST_NAME="' . $lname . '"';

            if ($password != '') {
                $password = md5($password);
                $sql .= ',PASSWORD ="' . $password . '"';
            }
            if($type!=''){
                $sql .= ',USER_ROLE_ID=' . $type . '';
            }
            $sql .= ' WHERE EMAIL="' . $email . '"';
            $result = @mysql_query($sql);
            //print_r($sql);die();
            if($result){
                return true;
            }else{
                return false;
            }
        } catch (Exception $err) {
            throw $err;
        }
    }

}

?>
