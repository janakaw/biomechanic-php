<?php
require_once 'packages.php';
global $login;
if (!$login->isLogged()) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
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

            <h2>Subscription</h2>
            <div id="c_all">
                <div id="content_left"> <span style="font-size:20px; font-weight:800">Manage subscriptions</span>
                    <hr style="width:960px; height:3px; background-color:#000; margin-top:5px;" />
                    <div class="subcription_content" style="position:absolute">
                        <table width="980">
                            <tr  height="60">
                                <td width="155" style="color:#666; font-weight:700" >Module</td>
                                <td width="94" style="color:#666; font-weight:700">Price</td>
                                <td width="213" style="color:#666; font-weight:700">Subscription Status</td>
                                <td width="169" style="color:#666; font-weight:700">Expiration Date</td>
                                <td width="325"></td>
                            </tr>
                            <?php
                            include "config/conn.php";

                            $sql = 'SELECT m.id AS MODULE_ID, m.name AS MODULE_NAME, m.type AS MODULE_TYPE, 
                                m.status AS MODULE_STATUS, m.SUBSCRIPTION_LENGTH AS MODULE_SUBSCRIPTION_LENGTH, 
                                m.PRICE AS MODULE_PRICE, s.status AS SUBSCRIPTION_STATUS, 
                                s.due_date AS SUBSCRIPTION_DUE_DATE
                                FROM  `module` m
                                LEFT JOIN subscription s ON m.id = s.module_id';

                            $result = @mysql_query($sql);

                            while ($row = mysql_fetch_assoc($result)) {
                                ?>
                                <tr height="60">
                                    <td ><?php echo $row['MODULE_NAME']; ?></td>
                                    <td>$<?php echo $row['MODULE_PRICE']; ?></td>
                                    <td><?php if ($row['SUBSCRIPTION_STATUS'] == NULL) { 
									?>
                                            <a href="javascript:void(0" onclick="loadPaymenentPage(<?php echo $row['MODULE_ID']; ?>, '<?php echo $row['MODULE_NAME'];?>', <?php echo $row['MODULE_PRICE']; ?>)">Subscribe Now</a>
                                     <?php
                                           } else {
                                               echo $row['MODULE_PRICE'];
                                           }
                                           ?></td>
                                    <td><?php echo $row['SUBSCRIPTION_DUE_DATE']; ?></td>
                                </tr>                                
                            <?php } ?>

                        </table>
                    </div>
                </div>
                <div id="content_rh">
                    <div id="video" style="height:200px; "> </div>
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
                                    <div id="light" class="pop_up_conf_1">
                                        <div class="pay" id="pay">
                                                <div class="well">
    
													<p id="modulePrice"> Module Name, $36.00 </p>
    
                                            
                                            <form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">   
												<input type="hidden" name="name" id="name" value="" /> 
												  
												<input type="hidden" name="price" id="price" value="" />  
													<input type="hidden" name="cmd" value="_xclick" /> 
													<input type="hidden" name="no_note" value="1" />
													<input type="hidden" name="lc" value="UK" />
													<input type="hidden" name="currency_code" value="GBP" />
													<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
													<input type="hidden" name="first_name" value="Customer's First Name"  />
													<input type="hidden" name="last_name" value="Customer's Last Name"  />
													<input type="hidden" name="payer_email" value="customer@example.com"  />
													<input type="hidden" name="item_number" id="item_number" value="" / >
													<input type="submit" class="btn" value="Submit Payment"/> <input type="button" onclick = "document.getElementById('light').style.display = 'none';
                document.getElementById('fade').style.display = 'none'" class="btn" value="Cancel"/>
												</form>
												</br>
												
                                            
												</div>
                                            
                                        </div>
                                        <div class="activated" id="activated" style="display:none">
                                            Module xxxx has been activated</br></br>
                                            <span><input type="submit" style="width:300px" value="Close" class="btn btn-success" id="closeBtn1"  onclick = "close();"/></span>
                                        </div>

                                    </div>
                                    <div id="fade" class="black_overlay" style="height:984px"></div>

                                    <script>
									
									function loadPaymenentPage(id, name, price) {
									$('#modulePrice').html(name + ', $' + price + '.00');
									document.getElementById('item_number').value=id;
									document.getElementById('name').value=name;
									document.getElementById('price').value=price;
									document.getElementById('light').style.display = 'block';
									document.getElementById('fade').style.display = 'block';
									window.scrollTo(0, 0);
									
									}
									
									
            $('#confirmBtn').click(function() {







                // $('#pay').css('display', 'none');
                //	  $('#activated').css('display', 'block');




            });

            function close() {

                document.getElementById('light').style.display = 'none';
                document.getElementById('fade').style.display = 'none'
                document.getElementById('pay').style.display = 'block'
                document.getElementById('activated').style.display = 'none'


            }
                                    </script>
                                    </body>
                                    </html>
