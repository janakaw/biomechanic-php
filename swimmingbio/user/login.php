<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/common.css" />
 <!--	<script type="text/javascript" src="swfobject.js"></script>-->
    </head>

    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <h1><a href="index.php">Swimming Biomechanics</a></h1>
                </div>
                <?php include 'includes/login_register_block.php'; ?>
                <!-------end MAINNAV DIV ---------->

            </div>
            <!-------end header div ---------->

            <h2>Login</h2>
            <div id="c_all">


                <div id="content_rh" style="height:auto; padding-top:0px; padding-bottom:30px; margin-left:auto; margin-right:auto; width:540px; background-color:#FFF; -moz-box-shadow: 0px 0px 10px 1px #999;
                     -webkit-box-shadow: 0px 0px 10px 1px #999;
                     box-shadow: 0px 0px 10px 1px #999;">



                    <div align="center" style="width:100%; height:40px; background-color:#333; padding-top:10px; border-bottom:solid thick #09F;">
                        <span style="color:#FFF; font-size:26px;">Login</span>

                    </div>
                    <div style="padding-top:30px">
                        <?php if (isset($_SESSION['msg'])) {
                            ?>
                            <div class="errorMsg">
                                <?php echo $_SESSION['msg']; ?>
                            </div>
                        <?php } ?>
                        <form class="form-horizontal" id="login_form" method="post" action="loginProcess.php" >
                            <fieldset>

                                <!-- Form Name -->

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userName">User Name</label>
                                    <div class="controls">
                                        <input id="userName" name="userName" type="text" placeholder="Type your user name here" class="input-xlarge" required=""/>

                                    </div>
                                </div>

                                <!-- Password input-->
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
                                        <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary"  value="Submit"/> <span style="margin-left:10px;"><a href="register.php">Not a Registered User? </a></span>

                                    </div>
                                </div>

                            </fieldset>
                        </form>

                    </div>

                </div>
            </div>
            <!-------CONTENT DIV CLOSE---------->

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
            <!----------FOOTER DIV CLOSE------->
        </div>
        <!-------CONTEAINER DIV CLOSE---------->

        <div id="footer_wrap"></div>
        <div id="light" class="white_content">

            <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display = 'none';
                    document.getElementById('fade').style.display = 'none'">Close</a></div>
        </div>
        <div id="fade" class="black_overlay"></div>
    </body>
</html>
