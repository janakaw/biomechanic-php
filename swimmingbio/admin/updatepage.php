<?php
include "config/conn.php";

$pageId = $_REQUEST['pageId'];
$title = $_REQUEST['title'];

$sql = "UPDATE page SET NAME='$title' WHERE ID='$pageId'";
//echo $sql;
$result = @mysql_query($sql);
if($result) {
echo '0';
} else {
echo '-1';
}

?>