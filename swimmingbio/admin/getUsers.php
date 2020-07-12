<?php

require_once 'admin_packages.php';
global $login;
try {
    if ($login->isLogged()) {
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            $type = trim($_GET['type']);
            $userObj = new adminUserManager();
            $userObj->getUsers($type);
        } else {
            //header('Location: admin_login.php');
        }
    } else {
        header('Location: admin_login.php');
    }
} catch (Exception $e) {
    header('Location: admin_login.php');
}
?>
