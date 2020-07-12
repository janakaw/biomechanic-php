<?php

require_once 'packages.php';
global $login;
try {
    if (!$login->isLogged()) {
        if (isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['firstName']) && !empty($_POST['firstName']) &&
                isset($_POST['lastName']) && !empty($_POST['lastName']) &&
                isset($_POST['password']) && !empty($_POST['password']) &&
                isset($_POST['repass']) && !empty($_POST['repass'])) {
            $email = (trim($_POST['email']));
            $userObj = new user($email);
            $emailValidator = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($emailValidator) {
                if (trim($_POST['password']) == trim($_POST['repass'])) {
                    if ($userObj->getEmail() == '') {
                        $fname = addslashes(trim($_POST['firstName']));
                        $lname = addslashes(trim($_POST['lastName']));
                        $type = USER_ROLE_ID;
                        $password = (trim($_POST['password']));
                        $userConObj = new userManager();
                        $result = $userConObj->adduser($email, $fname, $password, $lname, $type);
                        if ($result) {
                            $_SESSION['msg'] = '';
                            header('Location: index.php');
                        } else {
                            $_SESSION['msg'] = 'Unable to register this user to the system.';
                            header('Location: register.php');
                        }
                    } else {
                        $_SESSION['msg'] = 'This user already exists in the system.';
                        header('Location: register.php');
                    }
                } else {
                    $_SESSION['msg'] = 'Password not match.';
                    header('Location: add_admin_user.php');
                }
            } else {
                $_SESSION['msg'] = 'This email address is not valid.';
                header('Location: add_admin_user.php');
            }
        } else {
            $_SESSION['msg'] = 'Sorry! Unable to register this user.';
            header('Location: admin_login.php');
        }
    } else {
        header('Location: index.php');
    }
} catch (Exception $e) {
    $_SESSION['msg'] = 'Sorry! Prosess failed try again later.';
    header('Location: register.php');
}
?>
