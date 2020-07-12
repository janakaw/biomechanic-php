<?php
include "config/conn.php";


$title = $_REQUEST['title'];
$moduleId = $_REQUEST['moduleId'];

$sql = "INSERT INTO page(MODULE_ID,NAME,STATUS)VALUES('$moduleId','$title','1')";

$result = @mysql_query($sql);
if($result) {
echo mysql_insert_id();
} else {
echo '-1';
}

?>