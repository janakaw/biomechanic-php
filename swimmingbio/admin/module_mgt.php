<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
require_once 'admin_packages.php';
global $login;
if ($login->isLogged()) {
?>


    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Swimming Biomechanics</title>
            <link href="css/sb.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="css/bootstrap.css" />
            <SCRIPT LANGUAGE="JavaScript">
                <!-- Idea by:  Nic Wolfe -->
                <!-- This script and many more are available free online at -->
                <!-- The JavaScript Source!! http://javascript.internet.com -->

                <!-- Begin
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
<?php
    require_once 'includes/header.php';
?>
            <h2>All Modules</h2>
            <div id="c_all">
                <div id="content_left" style="width:1000px">



                    <table width="960">
                        <tr  height="60" style="border-bottom:#CCC solid 2px">
                            <td width="338" style="color:#666; font-weight:700" >MODULES</td>
                            <td width="94" style="color:#666; font-weight:700">PRICE</td>
                            <td width="121" style="color:#666; font-weight:700">STATUS</td>
                            <td width="88" style="color:#666; font-weight:700"></td>
                            <td width="48" style="color:#666; font-weight:700"></td>
                            <td width="243" style="color:#666; font-weight:700"></td>

                        </tr>
                        <tr height="60">
                            <td ><a href="">High Speed Stroke Analysis</a></td>
                            <td>$10</td>
                            <td>Active</td>

                            <td><a href="">Deactivate</a></td>
                            <td width="48" style="color:#666; font-weight:700"><a href="edit_module.html"><img src="images/edit.png" width="30" height="30" /></a></td>
                            <td width="243" style="color:#666; font-weight:700"><a href=""><img src="images/no.png" width="30" height="30" /></a></td>
                        </tr>
                        <tr height="60">
                            <td ><a href="">Free Styte Biomechanics</a></td>
                            <td>$10</td>
                            <td>Inactive</td>
                            <td><a href="">Activate</a></td>

                            <td width="48" style="color:#666; font-weight:700"><a href="edit_module.html"><img src="images/edit.png" width="30" height="30" /></a></td>
                            <td width="243" style="color:#666; font-weight:700"><a href=""><img src="images/no.png" width="30" height="30" /></a></td>
                        </tr>
                    </table>
                    <form action="edit_module.html">

                        <input type="submit" class="btn btn-success" value="New module"  />
                    </form>
                </div>
                <div id="content_rh">
                    <div id="video" style="height:500px; width:2px	"> </div>


                </div>
            </div>
            <!-------CONTENT DIV CLOSE---------->

            <div class="clear"></div>

<?php
    require_once 'includes/footer.php';
?>
            <!----------FOOTER DIV CLOSE------->
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