<?php
require_once 'packages.php';
global $login;
try {
    if (!$login->isLogged()) {
        if (isset($_POST['userName']) && !empty($_POST['userName']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $userName = addslashes((trim($_POST['userName'])));
            $passwd = (trim($_POST['password']));
            if ($login->checkLogin($userName, $passwd)) {
                header('Location: index.php');
            } else {
                header('Location: login.php');
            }
        } else {

            header('Location: login.php');
        }
    } else {
        header('Location: mgt.php');
    }
} catch (Exception $e) {
    header('Location: login.php');
}
?>
