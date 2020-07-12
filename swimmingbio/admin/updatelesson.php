<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $lessonId = $_REQUEST['lessonId'];
        $title = $_REQUEST['title'];
        $selectVideo = $_REQUEST['selectVideo'];
        $type = $_REQUEST['type'];

        $sql = "UPDATE lesson SET VIDEO_ID='$selectVideo', NAME='$title', IS_FREE='$type' WHERE ID='$lessonId'";
//echo $sql;
        $result = @mysql_query($sql);
        if ($result) {
            echo "UPDATED";
        } else {
            echo "ERROR";
        }
    } else {
        echo "ERROR";
    }
} else {
    echo "ERROR";
}
?>