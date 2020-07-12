<?php

require_once 'admin_packages.php';
global $login;
try {
    if (!$login->isLogged()) {
        if (isset($_POST['userName']) && !empty($_POST['userName']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $userName = addslashes((trim($_POST['userName'])));
            $passwd = (trim($_POST['password']));
            if ($login->checkLogin($userName, $passwd)) {
                header('Location: moduleList.php');
            } else {
                header('Location: admin_login.php');
            }
        } else {

            header('Location: admin_login.php');
        }
    } else {
        header('Location: moduleList.php');
    }
} catch (Exception $e) {
    header('Location: admin_login.php');
}
?>
