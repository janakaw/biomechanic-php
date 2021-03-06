<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		$('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">×</button> <h4>Warning!</h4> Please add the module title. </div>');		
	} else if( document.getElementById('price').value == '' ) {
		$('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">×</button> <h4>Warning!</h4> Please add the module price $. </div>');		
	} else {
    var frm = $('#addForm');

        $.ajax({
            type: frm.attr('method'),
            url: "updateModule.php",
            data: frm.serialize(),
			error : function() {
				$('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">×</button> <h4>Warning!</h4> Something getting wrong. please contact site administrator. </div>');		
				return false;
			},
	
			beforeSend : function() {
					
			},
            success: function (data) {
			//$('#msg').html(data);
				if (data.indexOf('UPDATED')>0) {
				$('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Success!</strong> You have successfully updated the module.</div>');
				} else {
                $('#msg').html('<div class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">×</button> <h4>Error!</h4> Something getting wrong. please contact site administrator. </div>');
				}
				
				setTimeout(function(){$('#msg').html('')},3000);
            }

        });
	}
	
	}
	
	function editPage(moduleId, pageId) {
	document.getElementById('pageId').value = pageId;
	document.getElementById('moduleId').value = moduleId;
	$('#editPageForm').submit();
	}
	
	function deletePage(x) {
		var r=confirm("Are you sure? you want to delete this page");
		if (r==true)
		{
			$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=deletePage&pageId="+x,

            // The type of request.
            type : "POST",

            // The type of data that is getting returned.
            dataType : "html",

            error : function() {
            	$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong>Error!</strong> Error occured while deleting.</div>');
            },

            beforeSend : function() {
                   
            },

            complete : function() {
                   
            },

            success : function(strData) {
            	if (strData==1) {
				$('#tr'+x).html('');
                    $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Success!</strong> You have successfully delete the page.</div>');
    			} else {
    				$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong>Error!</strong> Error occured while deleting.</div>');		
    			}    
            }
			});
		}
		else
		{
		
		} 
		
	
	}
	
	function changePageStatusTo(id, moduleId, status) {
	
		$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=changePageStatus&pageId="+id+"&status="+status,

            // The type of request.
            type : "POST",

            // The type of data that is getting returned.
            dataType : "html",

            error : function() {
            	$('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong>Error!</strong> Error occured while updating.</div>');
            },

            beforeSend : function() {
                   
            },

            complete : function() {
                   
            },

            success : function(strData) {
            	if(strData == 1) {
				if(status==1) {
					$('#st'+id).html("Active");
					$('#stlink'+id).html("<a onclick='changePageStatusTo("+id+", "+moduleId+", 0)' >Deactivate</a>");
				} else {
					$('#st'+id).html("Deactivate");
					$('#stlink'+id).html("<a onclick='changePageStatusTo("+id+", "+moduleId+", 1)' >Active</a>");
				}
				}
				//$('#chapterListContent').html(strData);   
					  
            }
			});
	
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
      
      <h2>Module Management</h2>
	  <div id="msg" >
	
	</div>
      <div id="c_all">
        <div id="content_left" style="width:1000px">
         <form action="updatemodule.php" id="addForm" name="addForm">
		 <?php
			$id = $_REQUEST['moduleId'];
			echo "<input id='modId' name='modId' type='hidden' value='$id' >";
			?>
         <table width="960">
              <tr  height="60" style="border-bottom:#CCC solid 2px">
            <td width="379" style="color:#232323; font-weight:600; font-size:22px" >Edit module</td>
            <td width="235" style="color:#666; font-weight:700"></td>
            <td width="330" style="color:#666; font-weight:700"></td>
           
           
          </tr>
              <tr height="60">
            <td style="font-size:18px; color:#666" >MODULE TITLE</td>
            
            <td style="font-size:18px; color:#666">MODULE PRICE</td>
            
            <td style="font-size:18px; color:#666">SUBSCRIPTION LENGTH</td>
            
          </tr>
           <tr height="60" valign="top">
            
            <?php
            require_once 'moduleContent/editModuleContent.php';
            ?>
            
          </tr>
            </table>
         </form>
         <table width="960">
		 <thead>
           <tr  height="60" style="border-bottom:#CCC solid 2px">
            <td width="338" style="font-size:18px; color:#666" >PAGES</td>
            <td width="121" style="font-size:18px; color:#666">STATUS</td>
            <td width="88" ></td>
            <td width="48"></td>
            <td width="243" ></td>
           
          </tr>
		  </thead>
              <tbody id="chapterListContent">
            <?php
            require_once 'moduleContent/pageList.php';
            ?>
			
			</tbody>
			
			
            </table>
            <form action="addpage.php" method="POST">
			
			<?php
			$id = $_REQUEST['moduleId'];
			echo "<input id='id' name='id' type='hidden' value='$id' >";
			?>
				<input type="button" class="btn btn-info" onclick="location.href='moduleList.php'"  value="Back To Module List" />
				<input type="submit" class="btn btn-success" value="New Page" />
			</form>
			
			<form id="editPageForm" name="editPageForm" action="editpage.php" method="GET">
				<input type="hidden" id="moduleId" name="moduleId" />
				<input type="hidden" id="pageId" name="pageId" />
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
    
   
    
    <div id="closeButton"> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
    
   
    </div>
    <div id="fade" class="black_overlay"></div>
</body>
</html>
