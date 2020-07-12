<?php
require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {
    if ($permission->hasPermission('USER')) {

?>

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Swimming Biomechanics</title>
            <link href="css/sb.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="css/bootstrap.css" />
            <link rel="stylesheet" href="css/common.css" />
            <script  type="text/javascript">

                function changeClass(type){
                    if(type=='admin'){
                        document.getElementById('admin_users').className='active';
                        document.getElementById('site_users').className='';
                    }else{
                        document.getElementById('admin_users').className='';
                        document.getElementById('site_users').className='active';
                    }
                }
            </script>
        </head>

        <body>
            <div id="container">
            <?php
            require_once 'includes/header.php';
            ?>
            <!-------end header div ---------->
            <h2>Users</h2>
            <?php
            if (isset($_GET['type']) && !empty($_GET['type'])) {
                $type = trim($_GET['type']);
                if ($type == USER_ROLE) {
                    $ucls = 'active';
                    $acls = '';
                } else {
                    $acls = 'active';
                    $ucls = '';
                }
            } else {
                $ucls = 'active';
                $acls = '';
                $type = USER_ROLE;
            }
            ?>
            <ul class="nav nav-tabs">
                <li onclick="changeClass('user')" id="site_users" class="<?php echo $ucls; ?>"><a href="user_mgt.php?type=<?php echo USER_ROLE ?>">Site Users</a></li>
                <li onclick="changeClass('admin')" id="admin_users" class="<?php echo $acls; ?>"><a href="user_mgt.php?type=<?php echo ADMIN_ROLE ?>">Admin Users</a></li>
                <li class="pull-right"><a href="add_admin_user.php">Add User</a></li>
            </ul>
            <?php
            try {
                //$type = (isset($_GET['type']) && !empty($_GET['type'])) ? trim($_GET['type']) : USER_ROLE;
                $userObj = new adminUserManager();
                $allUsers = $userObj->getUsers($type);
                $error = false;
            } catch (Exception $e) {
                $error = true;
            }

            if ($allUsers && !$error) {
            ?>
            <?php if (isset($_SESSION['msg'])) {
            ?>
                    <div class="error">
                <?php echo $_SESSION['msg']; ?>
                </div>
            <?php
                }
            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Type</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allUsers as $users) {
                    ?>
                        <tr>
                            <td><?php echo (isset($users['ID']) ? intval($users['ID']) : '-'); ?></td>
                            <td><?php echo (isset($users['EMAIL']) ? trim(stripslashes($users['EMAIL'])) : '-'); ?></td>
                            <td><?php echo (isset($users['FIRST_NAME']) ? trim(stripslashes($users['FIRST_NAME'])) : '-'); ?></td>
                            <td><?php echo (isset($users['LAST_NAME']) ? trim(stripslashes($users['LAST_NAME'])) : '-'); ?></td>
                            <td><?php echo (isset($users['ROLE']) ? ucwords(strtolower(str_replace('_',' ',$users['ROLE']))) : '-'); ?></td>
                            <td><?php echo (isset($users['CREATED_DATE']) ? ($users['CREATED_DATE']) : '-'); ?></td>
                            <td><a href="edit_user.php?id=<?php echo $users['ID'] ?>">Edit</a>&nbsp;<a href="delete_user.php?id=<?php echo $users['ID'] ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php
                } else {
                    echo '<div class="error">Sorry! unabel to get users from this system.</div>';
                }
            ?>
                <div class="clear"></div>
            <?php
                require_once 'includes/footer.php';
            ?>
            </div>
            <!-------CONTEAINER DIV CLOSE---------->

            <div id="footer_wrap"></div>
            <div id="light" class="white_content">



                <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>


                <iframe id="player_frame" src="http://192.248.12.9/~114012F/vdo/vdo.html"></iframe>
            </div>
            <div id="fade" class="black_overlay"></div>
        </body>
    </html>
<?php
} else {
                    header('Location: module_mgt.php');
                }
            } else {
                header('Location: admin_login.php');
            }