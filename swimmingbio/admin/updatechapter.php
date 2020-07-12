<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $chapterId = $_REQUEST['chapterId'];
        $title = $_REQUEST['title'];

        $sql = "UPDATE chapter SET NAME='$title' WHERE ID='$chapterId'";
//echo $sql;
        $result = @mysql_query($sql);
        if ($result) {
            echo '0';
        } else {
            echo '-1';
        }
    } else {
        echo "ERROR";
    }
} else {
    echo "ERROR";
}
?>