<?php

require_once 'config/config.php';
require_once "config/conn.php";
require_once 'module/userManager/login.php';
require_once 'module/userManager/userDao.php';
require_once 'module/userManager/user.php';
require_once 'module/userManager/userManager.php';


if (!isset($_SESSION)) {
    session_start();
}
$login = new Login();
?>
