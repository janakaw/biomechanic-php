<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $subscribeType = $_REQUEST['subscribeType'];


        $sql = "INSERT INTO module(NAME,TYPE,STATUS,SUBSCRIPTION_LENGTH,PRICE)VALUES('$title','$subscribeType','0','1','$price')";
//echo $sql;
        $result = @mysql_query($sql);
        if ($result == 1) {
            echo mysql_insert_id();
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