<?php

require_once 'packages.php';
global $login;
if ($login->isLogged()) {
    $login->logout();
    header('Location: login.php');
} else {
    header('Location: login.php');
}

?>