<?php

require_once 'admin_packages.php';
global $login;
global $permission;
try {
    if ($login->isLogged()) {
        if ($permission->hasPermission('USER')) {
            if (isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['fname']) && !empty($_POST['fname'])) {
                $email = (trim($_POST['email']));
                $userObj = new user($email);
                if ($userObj->getEmail() != '') {
                    $fname = addslashes(trim($_POST['fname']));
                    $lname = (isset($_POST['lname']) && trim($_POST['lname']) != '') ? addslashes(trim($_POST['lname'])) : '';
                    $type = (isset($_POST['userType']) && intval($_POST['userType']) != '') ? intval($_POST['userType']) : '';
                    $pwd = (isset($_POST['pwd']) && !empty($_POST['pwd'])) ? trim($_POST['pwd']) : '';
                    $userConObj = new adminUserManager();
                    $result = $userConObj->editUser($email, $fname, $pwd, $lname, $type);
                    if ($result) {
                        $_SESSION['msg'] = '';
                        header('Location: user_mgt.php');
                    } else {
                        $_SESSION['msg'] = 'Unable to update the user.';
                        header('Location: user_mgt.php');
                    }
                } else {
                    $_SESSION['msg'] = 'This user not in the system.';
                    header('Location: user_mgt.php');
                }
            } else {
                $_SESSION['msg'] = 'Unable to edit this user requested data not recieved correctly.';
                header('Location: user_mgt.php');
            }
        } else {
            $_SESSION['msg'] = 'Sorry! Permission denied.';
            header('Location: index.php');
        }
    } else {
        header('Location: admin_login.php');
    }
} catch (Exception $e) {
    $_SESSION['msg'] = 'Process failed, Unable to edit this user.';
    header('Location: user_mgt.php');
}
?>
