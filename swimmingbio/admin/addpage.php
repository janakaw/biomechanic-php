<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript">
            var action = "";
            $(document).ready(function() {

                var title = document.getElementById('title').value;

                if (title == '') {
                    action = "submitpage.php";
                } else {
                    action = "updatepage.php";
                }
            });

            function backModule() {
                var frm = $('#backtomodule');
                frm.submit();
            }

            function submitForm() {
                if (document.getElementById('title').value == '') {
                    $('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Warning!</h4> Please add the page title. </div>');
                } else {
                    var frm = $('#addForm');

                    $.ajax({
                        type: frm.attr('method'),
                        url: action,
                        data: frm.serialize(),
                        error: function() {
                            $('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Warning!</h4> Something getting wrong. please contact site administrator. </div>');
                            return false;
                        },
                        beforeSend: function() {

                        },
                        success: function(data) {
                            //$('#msg').html(data);
                            //alert(data);
                            if (data == -1) {
                                $('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Error!</h4> Something getting wrong. please contact site administrator. </div>');
                            } else if (data == 0) {
                                $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">�</button><strong>Success!</strong> You have successfully updated the page.</div>');
                            } else {
                                $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">�</button><strong>Success!</strong> You have successfully added a new page.</div>');
                                action = "updatepage.php";
                                document.getElementById('pageId').value = data;
                                document.getElementById('id').value = data;
                                document.getElementById("addChapterBtn").disabled = false;
                            }

                            setTimeout(function() {
                                $('#msg').html('')
                            }, 5000);
                        }

                    });
                }

            }


        </script>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <h1><a href="module_mgt.html">Swimming Biomechanics</a></h1>
                </div>
                <div id="login_register" class="login_register">
                    <ul>
                        <li id="l"><font color="#FFFFFF">Administrator</font></li>
                        <li id="r"><a href="index.html">Logout</a></li>
                    </ul>
                </div>
                <div id="mainnav">
                    <ul>
                        <li id="nav01" class="selected"><a href="moduleList.php">Module Management</a></li>
                        <li id="nav02" ><a href="contentManagement.php">Content Management</a></li>
                        <li id="nav03" ><a href="user_mgt.html">User Management</a></li>
                        <li id="nav04" ><a href="reporting.html">Reporting</a></li>
                    </ul>
                </div>
                <!-------end MAINNAV DIV ----------> 

            </div>
            <!-------end header div ---------->

            <h2>Pages of ...</h2>
            <div id="msg" >

            </div>
            <div id="c_all">
                <div id="content_left" style="width:1000px">
                    <form action="submitpage.php" id="addForm" name="addForm">
                        <input id="pageId" name="pageId" type="hidden"  >
                            <table width="960">
                                <tr  height="60" style="border-bottom:#CCC solid 2px">
                                    <td width="338" style="color:#232323; font-weight:600; font-size:22px">Add Page</td>
                                    <td width="121" ></td>
                                    <td width="88" ></td>


                                </tr>
                                <tr height="60">
                                    <td style="font-size:18px; color:#666" >Page TITLE</td>

                                    <td></td>

                                    <td></td>

                                </tr>
                                <tr height="60" valign="top">
                                    <td >
                                        <?php
                                        $id = $_REQUEST['id'];
                                        echo "<input id='moduleId' name='moduleId' type='hidden' value='$id' >";
                                        ?>
                                        <input onChange="submitForm()" id="title" name="title" type="text" placeholder="Title" class="input-xlarge" >

                                    </td>




                                </tr>
                            </table>
                    </form>
                    <table width="960">
                        <tr  height="60" style="border-bottom:#CCC solid 2px">
                            <td width="338" style="font-size:18px; color:#666">CHAPTER</td>
                            <td width="121"style="font-size:18px; color:#666">STATUS</td>
                            <td width="88" ></td>
                            <td width="48" ></td>
                            <td width="243"></td>

                        </tr>

                        <tr height="60">
                            <td ></td>

                            <td></td>
                            <td></td>

                            <td width="48" style="color:#666; font-weight:700"></td>
                            <td width="243" style="color:#666; font-weight:700"></td>
                        </tr>
                    </table>
                    <form action="addchapter.php">
                        <input id="id" name="id" type="hidden"  >

                            <?php
                            echo "<input id='id2' name='id2' type='hidden' value='$id' >";
                            ?>
                            <input type="button" onclick="backModule();" class="btn btn-info" value=" << Back to Module" />
                            <input name="addChapterBtn" id="addChapterBtn"  disabled="disabled" type="submit"  class="btn btn-success" value="Add new chapter" />
                    </form>
                    <form id="backtomodule" name="backtomodule" action="editmodule.php">
                        <?php
                        echo "<input id='moduleId' name='moduleId' type='hidden' value='$id' >";
                        ?>
                    </form>
                </div>
                <div id="content_rh">
                    <div id="video" style="height:500px; width:2px	"> </div>


                </div>
            </div>
            <!-------CONTENT DIV CLOSE---------->

            <div class="clear"></div>
            <div id="footer">
                <div id="footer_content">
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


        </div>
        <div id="fade" class="black_overlay"></div>
    </body>
</html>
