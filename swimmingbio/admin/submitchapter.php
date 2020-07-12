<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $title = $_REQUEST['title'];
        $pageId = $_REQUEST['pageId'];


        $sql = "INSERT INTO chapter(PAGE_ID,NAME,STATUS)VALUES('$pageId','$title','1')";
//echo $sql;
        $result = @mysql_query($sql);
        if ($result) {
            echo mysql_insert_id();
        } else {
            echo '-1';
        }
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>