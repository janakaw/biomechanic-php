<?php

// Database constants.
define('MYSQL_SERVER', '127.0.0.1');
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DATABASE', 'swimming_biomechanics');

define('USER_ROLE', 'user');
define('ADMIN_ROLE', 'admin');
define('SUPER_ADMIN_ROLE', 'super_admin');

define('USER_ROLE_ID', 3);
define('ADMIN_ROLE_ID', 2);
define('SUPER_ADMIN_ROLE_ID', 1);

define('PERMISSION', '{"'.SUPER_ADMIN_ROLE_ID.'":["USER","MODULE","REPORT","CONTENT"],"'.ADMIN_ROLE_ID.'":["MODULE","REPORT","CONTENT"],"'.USER_ROLE_ID.'":[]}');

// Settings needed to paypal integration
define('APPLICATION_BASE_URL','http://localhost/p/swimming-biomechanics/Source/SwimmingBio/user/');
define('PAYPAL_MERCHANT_ID','kasun.wijewardena@gmail.com');

?>
