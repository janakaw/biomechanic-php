<?php
require_once 'config/config.php';
require_once "config/conn.php";
require_once 'module/userManager/login.php';
require_once 'module/userManager/permission.php';
require_once 'module/userManager/adminUserDao.php';
require_once 'module/userManager/user.php';
require_once 'module/userManager/adminUserManager.php';


session_start();
$login = new Login();
$permission = new permission();

?>
