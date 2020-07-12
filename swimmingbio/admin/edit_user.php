<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require_once 'admin_packages.php';
global $login;
$error = false;
if ($login->isLogged()) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = (intval($_GET['id']));
        $userConObj = new adminUserManager();
        $userData = $userConObj->getUserData($id);
        if (!$userData) {
            $error = true;
            $_SESSION['msg'] = 'Sorry! unable to edit this user.';
        }
    } else {
        $error = true;
        $_SESSION['msg'] = 'Sorry! unable to edit this user. Requested data not received correctly.';
    }
?>

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Swimming Biomechanics</title>
            <link href="css/sb.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="css/bootstrap.css" />
            <link rel="stylesheet" href="css/common.css" />
        </head>

        <body>
            <div id="container">
            <?php
            require_once 'includes/header.php';
            ?>
            <h2>Edit User</h2>

            <?php
            if (!$error && $userData) {
            ?>
                <form action="admin_edit_user_process.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input value="<?php echo (isset($userData['EMAIL']) && $userData['EMAIL'] != '') ? $userData['EMAIL'] : '' ?>" type="text"class="form-control" id="email" disabled ="" required=""/>
                        <input value="<?php echo (isset($userData['EMAIL']) && $userData['EMAIL'] != '') ? $userData['EMAIL'] : '' ?>" type="hidden"  name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input value="<?php echo (isset($userData['FIRST_NAME']) && $userData['FIRST_NAME'] != '') ? $userData['FIRST_NAME'] : '' ?>" type="text" name="fname" class="form-control" id="fname" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input value="<?php echo (isset($userData['LAST_NAME'])&& $userData['LAST_NAME']!='')?$userData['LAST_NAME']:'' ?>" type="text" name="lname" class="form-control" id="lname"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="pwd" class="form-control" id="password"/>
                    </div>
                <?php
                $userObj = new adminUserManager();
                $userTypes = $userObj->getUserTypes();
                if (!empty($userTypes)) {
                ?>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="userType">
                            <option value="<?php (isset($userData['USER_ROLE_ID'])) ? $userData['USER_ROLE_ID'] : '' ?>"><?php echo ucwords(strtolower(str_replace('_', ' ', $userData['TYPE']))) ?></option>
                            
                        <?php foreach ($userTypes as $value) {
                        ?>
                            <option value="<?php echo $value['ID'] ?>"><?php echo ucwords(strtolower(str_replace('_', ' ', $value['NAME']))) ?></option>
                        <?php } ?>
                    </select>

                </div>
                <?php } ?>

                    <!--      <div class="checkbox">
                            <label>
                              <input type="checkbox"/> Enabled
                            </label>
                          </div>-->
                    <button type="submit" class="btn btn-default">Save</button>
                </form>

                <!-------CONTENT DIV CLOSE---------->

                <div class="clear"></div>
            <?php
                } else {
                    if (isset($_SESSION['msg'])) {
            ?>
                        <div class="error">
                <?php echo $_SESSION['msg']; ?>
                    </div>
            <?php
                    }
                }
                require_once 'includes/footer.php';
            ?>
            </div>
            <!-------CONTEAINER DIV CLOSE---------->

            <div id="footer_wrap"></div>
            <div id="light" class="white_content">



                <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>



            </div>
            <div id="fade" class="black_overlay"></div>
        </body>
    </html>
<?php
            } else {
                header('Location: admin_login.php');
            }
?>