<?php
require_once 'admin_packages.php';
global $permission;


?>
    <div id="header">
        <div id="logo">
            <h1><a href="../moduleList.php">Swimming Biomechanics</a></h1>
        </div>
        <div id="login_register" class="login_register">
            <ul>
                <li id="l"><font color="#FFFFFF">
                        <?php
                        if(isset ($_SESSION['adminUser']['name'])){
                            echo $_SESSION['adminUser']['name'];
                        }else{
                            echo 'Administrator';
                        }
                        ?>

                    </font></li>
                <li id="r"><a href="admin_logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="mainnav">
            <ul>
                <?php
                if ($permission->hasPermission('MODULE')) {
                ?>
                <li id="nav01" class="selected"><a href="moduleList.php">Module Management</a></li>
                <?php }?>
                <?php
                if ($permission->hasPermission('CONTENT')) {
                ?>
                <li id="nav02" ><a href="contentManagement.php">Content Management</a></li>
                <?php }?>
                <?php
                if ($permission->hasPermission('USER')) {
                ?>
                <li id="nav03" ><a href="user_mgt.php">User Management</a></li>
                <?php }?>
                <?php
                if ($permission->hasPermission('REPORT')) {
                ?>
                <li id="nav04" ><a href="reporting.html">Reporting</a></li>
                <?php }?>
            </ul>
        </div>

    </div>