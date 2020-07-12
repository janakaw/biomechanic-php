<?php

require_once 'admin_packages.php';
global $login;

if ($login->isLogged()) {
    header("Location: moduleList.php");
} else {
    header('Location: admin_login.php');
}
?>