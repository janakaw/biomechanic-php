<?php session_start(); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/login.css" />
    </head>

    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <h1><a href="index.php">Swimming Biomechanics</a></h1>
                </div>
                <div id="mainnav">
                </div>
            </div>

            <h2>Admin Login</h2>
            <div id="c_all">
                <div id="content_rh">
                    <div class="login-title" align="center">
                        <span>Login</span>

                    </div>
                    <div style="padding-top:30px">

                        <?php if (isset($_SESSION['msg'])) { ?>
                            <div class="error">
                        <?php echo $_SESSION['msg']; ?>
                            </div>
                        <?php
                        }
                        ?>

                        <form class="form-horizontal" action="admin_login_Process.php" method="post">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="userName">User Name</label>
                                    <div class="controls">
                                        <input id="userName" name="userName" type="text" placeholder="Type your user name here" class="input-xlarge" required=""/>

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input id="password" name="password" type="password" placeholder="Type your password here" class="input-xlarge" required=""/>

                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="singlebutton"></label>
                                    <div class="controls">
                                        <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary"  value="Submit"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                    </div>

                </div>
            </div>
            <div class="clear"></div>
            <div id="footer">
                <div id="footer_content">
                    <div id="footer_right">
                        <p>© Swimming Biomechanics 2013.</p>
                        <br/>
                        <p> All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer_wrap"></div>
    </body>
</html>
