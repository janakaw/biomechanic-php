<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
function deleteVideo(x) {
		var r=confirm("Are you sure? you want to delete this video");
		if (r==true)
		{
			$.ajax({
            // The link we are accessing.
            url : "deleteVideo.php?videoId="+x,

            // The type of request.
            type : "POST",

            // The type of data that is getting returned.
            dataType : "html",

            error : function() {
            	$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">?</button><strong>Error!</strong> Error occured while deleting. Please check whether this video is using by lesson.</div>');
            },

            beforeSend : function() {
                   
            },

            complete : function() {
                   
            },

            success : function(strData) {
            	if (strData==1) {
					$('#tr'+x).html("");
                    $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">?</button><strong>Success!</strong> You have successfully delete the video.</div>');
    			} else {
    				$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">?</button><strong>Error!</strong> Error occured while deleting.  Please check whether this video is using by a lesson.</div>');		
    			}    
            }
			});
		}
		else
		{
		
		} 
		
	
	}
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
        <li id="r"><a href="admin_logout.php" >Logout</a></li>
      </ul>
        </div>
       <div id="mainnav">
          <ul>
            <li id="nav01" ><a href="moduleList.php">Module Management</a></li>
            <li id="nav02" class="selected"><a href="content_mgt.html">Content Management</a></li>
            <li id="nav03" ><a href="user_mgt.php">User Management</a></li>
            <li id="nav04" ><a href="reporting.html">Reporting</a></li>
          </ul>
        </div>
        <!-------end MAINNAV DIV ----------> 
        
      </div>
      <!-------end header div ---------->
      
      <h2>Content Management</h2>
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
                                    echo "<div class='alert alert-success'><button data-dismiss='alert' class='close' type='button'>?</button><strong>Success!</strong> Successfully uploaded a new video.</div>";
                                }
                            }
                        } else {
                            //echo "ERROR";
                        }
                    } else {
                        //echo "<div class='alert alert-error'><button data-dismiss='alert' class='close' type='button'>?</button><strong>Error!</strong> File Extention does not allowed.</div>";
                    }
                }
				
				?>
	  
	  </div>
      <div id="c_all">
        <div id="content_left" style="width:1000px">
         
         
         
         <table width="960">
              <tr  height="60" style="border-bottom:#CCC solid 2px">
            <td width="489"  style="font-size:18px; color:#666" >VIDEO LESSON</td>
            <td width="90"  style="font-size:18px; color:#666">SIZE</td>
            <td width="169"  style="font-size:18px; color:#666">DURATION</td>
            <td width="85" style="color:#666; font-weight:700"></td>
            <td width="80" style="color:#666; font-weight:700"></td>
            <td width="19" style="color:#666; font-weight:700"></td>
           
          </tr>
         
		 
		 <?php
               

			$sql = "SELECT * FROM video";
			//echo $sql;
			$result = @mysql_query($sql);


			while($row = mysql_fetch_array($result)){	

			echo "<tr id='tr$row[0]' height='100' style='border-bottom:#CCC solid 1px'><td >";
            echo "<img src='images/SBWS - Page 2 - Pic 1.jpg'   width='80' height='80'/>";
            echo "<div style='margin-top:-60px; margin-left:100px;'><div>$row[1]<div style='margin-top:10px'>";
			echo "<font color='#999999'>$row[4]</font></div></div></td>";
            echo "<td>$row[3]MB</td>";
            echo "<td>$row[2]</td>";
            
            echo "<td><a href='#'>View</a></td>";
            echo "<td width='80' style='color:#666; font-weight:700'><a href='#' onclick='deleteVideo($row[0]);' style='color:#F00'>Delete</a></td></tr>";
			

			}
		?>
		 
		 
            </table>
         <input type="button" class="btn btn-primary" value="Upload new video"  style="margin-top:30px" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"/>
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
    <div id="light" class="white_content" style="height:75%; top:10%; overflow:hidden">
    
   
    
    <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
    

            <form name="videoForm" id="videoForm" class="form-horizontal" action="contentManagement.php" method="POST" enctype="multipart/form-data">
               
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
</script>
    
</body>
</html>
