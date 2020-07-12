<?php

require_once 'admin_packages.php';
global $login;

if ($login->isLogged()) {
    $login->logout();
}

header('Location: admin_login.php');

?>