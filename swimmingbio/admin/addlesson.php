<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Swimming Biomechanics</title>
        <link href="css/sb.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
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
                    <h1><a href="moduleList.php">Swimming Biomechanics</a></h1>
                </div>
                <div id="login_register" class="login_register">
                    <ul>
                        <li id="l"><font color="#FFFFFF">Administrator</font></li>
                        <li id="r"><a href="admin_logout.php">Logout</a></li>
                    </ul>
                </div>
                <div id="mainnav">
                    <ul>
                        <li id="nav01" class="selected"><a href="moduleList.php">Module Management</a></li>
                        <li id="nav02" ><a href="contentManagement.php">Content Management</a></li>
                        <li id="nav03" ><a href="user_mgt.php">User Management</a></li>
                        <li id="nav04" ><a href="reporting.html">Reporting</a></li>
                    </ul>
                </div>
                <!-------end MAINNAV DIV ----------> 

            </div>
            <!-------end header div ---------->

            <h2>Welcome to Swimming Biomechanics</h2>
            <div id="msg">
                <?php
                include "config/conn.php";

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_but'])) {


                    $videoTitle = $_REQUEST['videoTitle'];
					 $videoDuration = $_REQUEST['videoDuration'];

                    $allowedExts = array("flv", "mp4", "wmv", "wav");
                    $temp = explode(".", $_FILES["file"]["name"]);
					$fileSize = $_FILES["file"]["size"] / 1024000;
                    $extension = end($temp);
                    if (in_array($extension, $allowedExts)) {

                        $sql = "INSERT INTO video(TITLE, DURATION, SIZE, FILE_NAME)VALUES('$videoTitle','$videoDuration','$fileSize', '$videoTitle.$extension')";
                        //echo $sql;
                        $result = @mysql_query($sql);
                        if ($result == 1) {
                            $fileName = mysql_insert_id();


                            if ($_FILES["file"]["error"] > 0) {
                                //echo "ERROR";
                            } else {


                                if (file_exists("videos/" . $_FILES["file"]["name"])) {
                                    //echo "ERROR";
                                } else {
                                    move_uploaded_file($_FILES["file"]["tmp_name"], "lessonContent/videos/" . $videoTitle . ".$extension");
                                    echo "<div class='alert alert-success'><button data-dismiss='alert' class='close' type='button'>�</button><strong>Success!</strong> Successfully uploaded a new video.</div>";
                                }
                            }
                        } else {
                            //echo "ERROR";
                        }
                    } else {
                        //echo "<div class='alert alert-error'><button data-dismiss='alert' class='close' type='button'>�</button><strong>Error!</strong> File Extention does not allowed.</div>";
                    }
                }
                ?>
            </div>
            <div id="c_all">
                <div id="content_left">
                    <form action="submitlesson.php" name="addForm" id="addForm">
                        <?php
                        $chapterId = $_REQUEST['id'];
                        $pageId = $_REQUEST['id2'];
                        $moduleId = $_REQUEST['id3'];

                        echo "<input id='chapterId' name='chapterId' type='hidden' value='$chapterId' >";
                        ?>
                        <table width="960">
                            <tr  height="60" style="border-bottom:#CCC solid 2px">
                                <td colspan="2" style="color:#232323; font-weight:600; font-size:22px">Edit Lesson</td>
                            </tr>
                            <tr> 
                                <td height="50" colspan="2"  style="font-size:18px; color:#666">LESSON FILE</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select id="selectVideo" name="selectVideo" class="input-xlarge">
                                        <option>Select a Video File</option> 

                                        <?php
                                        $sql = "SELECT * FROM video";

                                        $result = @mysql_query($sql);


                                        while ($row = mysql_fetch_array($result)) {


                                            echo "<option value='$row[0]'>$row[1]</option>";
                                        }
                                        ?>


                                        <option>Upload New Video</option>


                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td height="50"  colspan="2"  style="font-size:18px; color:#666">LESSON TITLE</td>
                            </tr>
                            <tr>       
                                <td colspan="2"><input name="title" id="title" type="text" placeholder="Title" class="input-xlarge" value="">
                                </td>
                            </tr>
                            <tr>
                                <td height="50"  colspan="2"  style="font-size:18px; color:#666">TYPE</td>
                            </tr>
                            <tr>
                                <td width="219"><input type="radio" value="1"  name="type" id="type" checked="checked" style="vertical-align:text-bottom" >  Free(available to all)</td><td width="729"> <input type="radio" id="type" value="0" name="type"  style="vertical-align:text-bottom" >  Paid (subscribed)</td>
                            </tr>
                            <tr>
                                <td width="219">

                                    <input type="submit" class="btn btn-success"  value="Save" style="margin-top:50px"/> <input type="button" class="btn btn-danger"  value="Delete" style="margin-top:50px"/>


                                </td>
                                <td width="729" valign="bottom" ></td>

                            </tr>
                            <td width="219">

                                <input type="button" class="btn btn-info"  value="<< Back To Chapter" onclick="backChapter()" style="margin-top:50px"/> 


                            </td>
                            <td width="729" valign="bottom" ></td>

                            </tr>
                        </table>
                    </form>
                    <form id="backtochapter" name="backtochapter" action="editchapter.php">
                        <?php
                        echo "<input id='chapterId' name='chapterId' type='hidden' value='$chapterId' >";
                        echo "<input id='moduleId' name='moduleId' type='hidden' value='$moduleId' >";
                        echo "<input id='pageId' name='pageId' type='hidden' value='$pageId' >";
                        ?>
                    </form>
                </div>
                <div id="content_rh">
                    <div id="video" style="height:350px;">

                        <div id='player' style="width:350px; height:350px; border:solid #000 2px; margin-top:80px;"></div>

                    </div>


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
        <div id="light" class="white_content" style="height:50%; top:20%; overflow:hidden">



            <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display = 'none';
                document.getElementById('fade').style.display = 'none'">Close</a></div>

            <form name="videoForm" id="videoForm" class="form-horizontal" action="addlesson.php" method="POST" enctype="multipart/form-data">
                <?php
                echo "<input id='id' name='id' type='hidden' value='$chapterId' >";
                echo "<input id='id2' name='id2' type='hidden' value='$moduleId' >";
                echo "<input id='id3' name='id3' type='hidden' value='$pageId' >";
                ?>
                <fieldset>

                    <!-- Form Name -->
                    <legend>Upload a new lesson video</legend>

                    <!-- Select Basic -->


                    <!-- Select Basic -->
                    <div class="control-group" id="title_div">
                        <label class="control-label" for="Title">Title</label>
                        <div class="controls">
                            <input type="text" name="videoTitle" id="videoTitle" required="required" class="input-xlarge" />
                        </div>
                    </div>

<!-- Select Basic -->
                    <div class="control-group" id="title_div">
                        <label class="control-label" for="Title">Duration</label>
                        <div class="controls">
                            <input type="text" name="videoDuration" id="videoDuration" required="required" class="input-xlarge" />
                        </div>
                    </div>


                    <!-- File Button --> 
                    <div class="control-group">
                        <label class="control-label" for="filebutton">Choose File</label>
                        <div class="controls">
                            <input id="file" name="file" class="input-file" type="file">
                        </div>
                    </div>
                    <!-- Button (Double) -->
                    <div class="control-group">
                        <label class="control-label" for="Cancel"></label>
                        <div class="controls">
                            <button id="submit_but" name="submit_but" class="btn btn-success">Submit</button>
                            <button id="Cancel" name="Cancel" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>

                </fieldset>
            </form>


        </div>
        <div id="fade" class="black_overlay" style="height:1000px"></div>






        <script>

            function backChapter() {
                var frm = $('#backtochapter');
                frm.submit();
            }


            $(document).ready(function() {
                var val = $("#selectVideo").val();
                if (val == 'Upload New Video') {

                    $('#light').css('display', 'block');

                    $('#fade').css('display', 'block');

                    $(document).scrollTop(0, 0);
                }

            });
            $('#selectVideo').on('change', function() {

                var val = $("#selectVideo").val();
                if (val == 'Upload New Video') {

                    $('#light').css('display', 'block');

                    $('#fade').css('display', 'block');

                    $(document).scrollTop(0, 0);
                }
                else {

                }

            });
        </script>
        <script type="text/javascript">

            $(document).ready(function() {

                var frm = $('#addForm');
                frm.submit(function() {
                    var val = $("#selectVideo").val();
                    var title = $('#title').val();
                    if (val == 'Upload New Video' || val == 'Select a Video File') {
                        $('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Warning!</strong> Please select a video.</div>');
                    } else if (title.trim() == '') {
                        $('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Warning!</strong> Please add lesson title.</div>');
                    } else {
                        $.ajax({
                            type: frm.attr('method'),
                            url: frm.attr('action'),
                            data: frm.serialize(),
                            error: function() {
                                $('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Error!</strong> Error occured while updating.</div>');
                                return false;
                            },
                            beforeSend: function() {

                            },
                            success: function(data) {
                                $("#title").val("");
                                $("#selectVideo").val("Select a Video File");
                                $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">�</button><strong>SUCCESS!</strong> successfully add lesson.</div>');
                            }

                        });
                    }
                    return false;
                });
            });




        </script>
    </body>
</html>
