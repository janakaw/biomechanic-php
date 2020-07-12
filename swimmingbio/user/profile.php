<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/validate_reg.js"></script>
        <script type="text/javascript" src="js/jquery.passstrength.js"></script>
        <SCRIPT LANGUAGE="JavaScript">
<!-- Idea by:  Nic Wolfe -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

            < !--Begin
            function popUp(URL) {
                day = new Date();
                id = day.getTime();
                eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 390,top = 150');");
            }
// End -->
<!------Flash installation------------------>
        </script>
        <script type="text/javascript" src="swfobject.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#password').passStrengthify();
            });
            var flashvars = {};
            var params = {};
            var attributes = {};
            swfobject.embedSWF("sb_player1.swf", "myAlternativeContent", "362", "304", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
        </script>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <h1><a href="index.html">Swimming Biomechanics</a></h1>
                </div>
                <?php include 'includes/login_register_block.php'; ?>
                <div id="mainnav">
                    <ul>
                        <li id="nav01"><a href="index.php">Home</a></li>
                        <li id="nav01"><a href="fb.php">Freestyle Biomechanics</a></li>
                    </ul>
                </div>
                <!-------end MAINNAV DIV ----------> 

            </div>
            <!-------end header div ---------->

            <h2>Profile</h2>
            <div id="c_all">
                <div id="content_left">

                    <div style="position:absolute; width:960px">
                        <form class="form-horizontal" id="register" method="POST">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Profile</legend>


                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Email address</label>
                                    <div class="controls">
                                        <input id="textinput" name="email" type="text" placeholder="Email address" class="input-xlarge" value="example@example.com"  disabled><span class="help-block"></span> 

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
                                    <label class="control-label" for="textinput">Legal first name</label>
                                    <div class="controls">
                                        <input id="textinput" name="firstName" type="text" placeholder="Legal first name" class="input-xlarge" value="john"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Legal last name</label>
                                    <div class="controls">
                                        <input id="textinput"  name="lastName" name="textinput" type="text" placeholder="Legal last name" class="input-xlarge" value="michel"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Address line 1</label>
                                    <div class="controls">
                                        <input id="textinput"  name="address1" type="text" placeholder="Address line 1" class="input-xlarge" value="1st street"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Address line 2 (optional)</label>
                                    <div class="controls">
                                        <input id="textinput" name="address2" type="text" placeholder="Address line 2" class="input-xlarge" value="abc road"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput"  >City</label>
                                    <div class="controls">
                                        <input id="textinput" name="city" type="text" placeholder="City" class="input-xlarge" value="colombo"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput ">State</label>
                                    <div class="controls">
                                        <input id="textinput" name="state" type="text" placeholder="State" class="input-xlarge" value="sri lanka" ><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="textinput">Zip Code</label>
                                    <div class="controls">
                                        <input id="textinput" name="zip" type="text" placeholder="Zip Code" class="input-xlarge" value="234234"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="control-group">
                                    <label class="control-label" for="selectbasic">Phone Type</label>
                                    <div class="controls">
                                        <select id="selectbasic" name="phnType" class="input-xlarge"><span class="help-block"></span> 
                                            <option>Mobile</option>
                                            <option>Fixed</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="control-group">
                                    <label class="control-label" for="selectbasic" >Country Code</label>
                                    <div class="controls">
                                        <select id="selectbasic" name="countryCode" class="input-xlarge" ><span class="help-block"></span> 
                                            <option>Option one</option>
                                            <option>Option two</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">

                                    <label class="control-label" for="textinput" >Phone Number</label>
                                    <div class="controls">
                                        <input id="textinput" name="phone" type="text" placeholder="Phone Number" class="input-xlarge" value="2323423"><span class="help-block"></span> 

                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="singlebutton"></label>
                                    <div class="controls">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
                                        <input id="singlebutton" name="singlebutton" class="btn btn-primary" type="reset" value="Reset" />
                                    </div>
                                </div>

                            </fieldset>
                        </form>
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
                    <div id="footer_left">
                        <h3>Keep in touch</h3>
                        <form id="mc-embedded-subscribe-form" class="form" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="">
                            <input id="mce-EMAIL" class="input" type="email" value="You email address" onblur="if (value == '')
                    value = defaultValue" onfocus="if (value == defaultValue)
                    value = ''" name="EMAIL">
                                <input type="submit" value="submit">
                                    </form>
                                    </div>
                                    <div id="footer_center">
                                        <h3>Social Networking</h3>
                                        <li id="f_2"><a href="">+ Join us on Facebook</a></li>
                                        <li id="f_3"><a href="">+ Follow us on Twitter</a></li>
                                    </div>
                                    <div id="footer_center2">
                                        <p><A HREF="javascript:popUp('jan_bio.html')">Jan Prins - Bio</A>
                                            <p/>
                                    </div>
                                    <div id="footer_right">
                                        <p>� Swimming Biomechanics 2013.</p>
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


                                        <iframe id="player_frame" src="http://192.248.12.9/~114012F/vdo/vdo.html"></iframe>    
                                    </div>
                                    <div id="fade" class="black_overlay"></div>
                                    </body>
                                    </html>
