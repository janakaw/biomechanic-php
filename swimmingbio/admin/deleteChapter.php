<?php

require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {

        $chapterId = $_REQUEST['chapterId'];

        $sql = "SELECT * FROM lesson WHERE CHAPTER_ID = $chapterId";
//echo $sql;
        $result = @mysql_query($sql);


        while ($row = mysql_fetch_array($result)) {

            $sql = "DELETE FROM lesson WHERE ID='$row[0]'";

//echo $sql;
            $result = @mysql_query($sql);
        }

        $sql = "DELETE FROM chapter WHERE ID='$chapterId'";

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