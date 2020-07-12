<?php

require_once 'admin_packages.php';
global $login;
global $permission;
try {
    if ($login->isLogged()) {
        if ($permission->hasPermission('USER')) {
            if (isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['fname']) && !empty($_POST['fname']) &&
                    isset($_POST['pwd']) && !empty($_POST['pwd']) &&
                    isset($_POST['userType']) && !empty($_POST['userType'])) {
                $email = (trim($_POST['email']));
                $userObj = new user($email);
                $emailValidator = filter_var($email, FILTER_VALIDATE_EMAIL);
                if ($emailValidator) {
                    if ($userObj->getEmail() == '') {
                        $fname = addslashes(trim($_POST['fname']));
                        $lname = (isset($_POST['lname']) && trim($_POST['lname']) != '') ? addslashes(trim($_POST['lname'])) : '';
                        $type = intval($_POST['userType']);
                        $password = (trim($_POST['pwd']));
                        $userConObj = new adminUserManager();
                        $result = $userConObj->adduser($email, $fname, $password, $lname, $type);
                        if ($result) {
                            $_SESSION['msg'] = '';
                            header('Location: user_mgt.php');
                        } else {
                            $_SESSION['msg'] = 'Unable to add user to the system.';
                            header('Location: add_admin_user.php');
                        }
                    } else {
                        $_SESSION['msg'] = 'This user already exists in the system.';
                        header('Location: add_admin_user.php');
                    }
                } else {
                    $_SESSION['msg'] = 'This email address is not valid.';
                    header('Location: add_admin_user.php');
                }
            } else {
                header('Location: admin_login.php');
            }
        } else {
            $_SESSION['msg'] = 'Sorry! Permission denied.';
            header('Location: index.php');
        }
    } else {
        header('Location: admin_login.php');
    }
} catch (Exception $e) {
    header('Location: admin_login.php');
}
?>
