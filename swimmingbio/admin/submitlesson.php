<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $chapterId = $_REQUEST['chapterId'];
        $title = $_REQUEST['title'];
        $selectVideo = $_REQUEST['selectVideo'];
        $type = $_REQUEST['type'];

        $sql = "INSERT INTO lesson(CHAPTER_ID, VIDEO_ID, NAME,IS_FREE, STATUS)VALUES('$chapterId', '$selectVideo', '$title', '$type', '1')";
//echo $sql;
        $result = @mysql_query($sql);
        if ($result) {
            echo mysql_insert_id();
        } else {
            echo "ERROR";
        }
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>