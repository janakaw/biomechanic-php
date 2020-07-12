<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/common.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/validate_reg.js"></script>
        <script type="text/javascript" src="js/jquery.passstrength.js"></script>

<!--        <script type="text/javascript" src="swfobject.js"></script>-->
        <script type="text/javascript">
            $(document).ready(function() {

                $('#password').passStrengthify();
            });

        </script>
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

            <h2>Sign up to Swimming Biomechanics</h2>
            <div id="c_all">
                <div id="content_left">

                    <?php if (isset($_SESSION['msg'])) {
                        ?>
                        <div class="errorMsg">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                    <?php } ?>
                    <div style="position:absolute; width:960px">
                        <form class="form-horizontal" id="register" method="POST" action="registerProcess.php">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Sign Up</legend>


                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Email address</label>
                                    <div class="controls">
                                        <input id="textinput" name="email" type="text" placeholder="Email address" class="input-xlarge"><span class="help-block"></span>

                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="passwordinput">Choose a password</label>
                                    <div class="controls">
                                        <input  name="password" id="password" type="password" placeholder="Password" class="input-xlarge"><span class="help-block"></span>

                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="passwordinput">Re-enter password</label>
                                    <div class="controls">
                                        <input id="passwordinput" name="repass" type="password" placeholder="Re-enter password" class="input-xlarge"><span class="help-block"></span>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">First Name</label>
                                    <div class="controls">
                                        <input id="textinput" name="firstName" type="text" placeholder="Legal first name" class="input-xlarge"><span class="help-block"></span>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Last Name</label>
                                    <div class="controls">
                                        <input id="textinput"  name="lastName" name="textinput" type="text" placeholder="Legal last name" class="input-xlarge"><span class="help-block"></span>

                                    </div>
                                </div>


                                <!-- Multiple Checkboxes (inline) -->
                                <!--                                <div class="control-group">
                                                                    <label class="control-label" for="checkboxes"></label>
                                                                    <div class="controls">
                                                                        <label class="checkbox inline" for="checkboxes-0">
                                                                            <input type="checkbox" name="agree" id="checkboxes-0" value="I agree to the terms of Service and Honour Code">
                                                                                I agree to the <a href="#">terms of Service </a>and  <a href="#">Honour Code</a>
                                                                        </label><span class="help-block"></span>
                                                                    </div>
                                                                </div>-->

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="singlebutton"></label>
                                    <div class="controls">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>

                    <div class="have_an_account">
                        <span>Have an Account?</span><br>
                            <p>If you already have a</br> password, please <a href="login.php">sign in.</a></p>
                    </div>
                </div>
                <div id="content_rh">
                    <div id="video" style="height:1050px;">  </div>

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

        </div>
        <div id="fade" class="black_overlay"></div>
    </body>
</html>
