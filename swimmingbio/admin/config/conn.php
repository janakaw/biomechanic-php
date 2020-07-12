<?php

include_once 'config.php';

$conn = @mysql_connect(MYSQL_SERVER,MYSQL_USERNAME,MYSQL_PASSWORD);
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db(MYSQL_DATABASE, $conn);


?>