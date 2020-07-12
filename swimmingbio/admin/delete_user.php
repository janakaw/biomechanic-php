<?php

require_once 'admin_packages.php';
global $login;
global $permission;
try {
    if ($login->isLogged()) {
        if ($permission->hasPermission('USER')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = (intval($_GET['id']));
                $userConObj = new adminUserManager();
                $result = $userConObj->deleteUser($id);
                if ($result) {
                    $_SESSION['msg'] = '';
                    header('Location: user_mgt.php');
                } else {
                    $_SESSION['msg'] = 'Sorry! unable to delete this user.';
                    header('Location: user_mgt.php');
                }
            } else {
                $_SESSION['msg'] = 'Sorry! unable to delete this user. Requested data not received correctly.';
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
    $_SESSION['msg'] = 'Sorry! Process failed, try again later.';
    header('Location: user_mgt.php');
}
?>
