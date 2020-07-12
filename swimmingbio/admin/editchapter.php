<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require_once 'admin_packages.php';
global $login;
global $permission;
if ($login->isLogged()) {

    if ($permission->hasPermission('MODULE')) {
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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	
	
	function submitForm() {
	if(document.getElementById('title').value == '') {
		$('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Warning!</h4> Please add the chapter title. </div>');		
	} else {
    var frm = $('#addForm');

        $.ajax({
            type: frm.attr('method'),
            url: "updatechapter.php",
            data: frm.serialize(),
			error : function() {
				$('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Warning!</h4> Something getting wrong. please contact site administrator. </div>');		
				return false;
			},
	
			beforeSend : function() {
					
			},
            success: function (str) {
			//$('#msg').html(data);
			
				if(!(str == -1)) {
				$('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">�</button><strong>Success!</strong> You have successfully updated the chapter.</div>');
				} else {
                $('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">�</button> <h4>Error!</h4> Something getting wrong. please contact site administrator. </div>');
				}
				
				setTimeout(function(){$('#msg').html('')},5000);
            }

        });
	}
	
	}
	
	function backPage() {
		var frm = $('#backtopage');
		frm.submit();
	}
	
	function toEditLessonPage(id) {
	//alert(id);
		document.getElementById('lessonId').value=id;
		var frm = $('#editLesson');
		frm.submit();
	}
	
	function changeStatusTo(id, status) {
	//alert(id);
		$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=changeLessonStatus&lessonId="+id+"&status="+status,

            // The type of request.
            type : "POST",

            // The type of data that is getting returned.
            dataType : "html",

            error : function() {
            	$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Error!</strong> Error occured while updating.</div>');
            },

            beforeSend : function() {
                   
            },

            complete : function() {
                   
            },

            success : function(strData) {
			//alert(strData + " " + status );
            	if(strData == 1) {
				if(status == 1) {
					$('#st'+id).html("Active");
					$('#stlink'+id).html("<a onclick='changeStatusTo("+id+",  0)' >Deactivate</a>");
				} else {
					$('#st'+id).html("Deactivate");
					$('#stlink'+id).html("<a onclick='changeStatusTo("+id+", 1)' >Active</a>");
				}
				}
				//$('#chapterListContent').html(strData);   
					  
            }
			});
	
	}
	
		function deleteLesson(x) {
		var r=confirm("Are you sure? you want to delete this lesson");
		if (r==true)
		{
			$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=deleteLesson&lessonId="+x,

            // The type of request.
            type : "POST",

            // The type of data that is getting returned.
            dataType : "html",

            error : function() {
            	$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Error!</strong> Error occured while deleting.</div>');
            },

            beforeSend : function() {
                   
            },

            complete : function() {
                   
            },

            success : function(strData) {
            	if (strData==1) {
					$('#tr'+x).html("");
                    $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">�</button><strong>Success!</strong> You have successfully delete the lesson.</div>');
    			} else {
    				$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">�</button><strong>Error!</strong> Error occured while deleting.</div>');		
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
      <?php
            require_once 'includes/header.php';
            ?>
      <!-------end header div ---------->
      
      <h2>Chapters of ...</h2>
	  <div id="msg" >
	
	</div>
      <div id="c_all">
        <div id="content_left" style="width:1000px">
          <form action="updatechapter.php" id="addForm" name="addForm" method="POST">
		  
         <table width="960">
              <tr  height="60" style="border-bottom:#CCC solid 2px">
            <td width="338" style="color:#232323; font-weight:600; font-size:22px">Edit Chapter</td>
            <td width="121" ></td>
            <td width="88" ></td>
           
           
          </tr>
              <tr height="60">
            <td style="font-size:18px; color:#666" >CHAPTER TITLE</td>
            
            <td></td>
            
            <td></td>
            
          </tr>
          <tr height="60" valign="top">
            
            <?php
            require_once 'chapterContent/editChapterContent.php';
            ?>
			
          </tr>
            </table>
         </form>
         <table width="960">
           <tr  height="60" style="border-bottom:#CCC solid 2px">
            <td width="338" style="font-size:18px; color:#666">LESSONS</td>
            <td width="121"style="font-size:18px; color:#666">STATUS</td>
            <td width="88" ></td>
            <td width="48" ></td>
            <td width="243"></td>
           
           </tr>
		   
		     <?php
            require_once 'chapterContent/lessonList.php';
            ?>
			
		   <tr  height="20">
            <td ></td>
            <td ></td>
            <td ></td>
            <td  ></td>
            <td ></td>
           
           </tr>
           
		 
          
         </table>
         <form action="addlesson.php">
			<?php
			$chapterId = $_REQUEST['chapterId'];
			$moduleId = $_REQUEST['moduleId'];
			$pageId = $_REQUEST['pageId'];
			echo "<input id='id' name='id' type='hidden' value='$chapterId' >";
			echo "<input id='id3' name='id3' type='hidden' value='$moduleId' >";
			echo "<input id='id2' name='id2' type='hidden' value='$pageId' >";
			?>
			<input type="button" onclick="backPage();" class="btn btn-info" value=" << Back to Page" />
			<input type="submit"  class="btn btn-success" value="Add new lesson" />
         </form>
		 <form id="backtopage" name="backtopage" action="editpage.php">
		 <?php
		 echo "<input id='moduleId' name='moduleId' type='hidden' value='$moduleId' >";
			echo "<input id='pageId' name='pageId' type='hidden' value='$pageId' >";
			?>
		 </form>
		 <form id="editLesson" name="editLesson" action="editlesson.php">
		 <input type="hidden" name="lessonId" id="lessonId"/>
		 <?php
			
			echo "<input id='id' name='id' type='hidden' value='$chapterId' >";
			echo "<input id='id2' name='id2' type='hidden' value='$moduleId' >";
			echo "<input id='id3' name='id3' type='hidden' value='$pageId' >";
			?>
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
                    header('Location: index.php');
                }
            } else {
                header('Location: admin_login.php');
            }
?>