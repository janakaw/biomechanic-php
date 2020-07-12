<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $videoId = $_REQUEST['videoId'];



        $sql = "DELETE FROM video WHERE ID='$videoId'";

//echo $sql;
        $result = @mysql_query($sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>