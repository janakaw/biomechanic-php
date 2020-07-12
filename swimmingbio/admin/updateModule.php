<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $moduleId = $_REQUEST['modId'];
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $subscribeType = $_REQUEST['subscribeType'];
        
        $sql = "UPDATE module SET NAME='$title',TYPE='$subscribeType',PRICE='$price' WHERE ID='$moduleId'";

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