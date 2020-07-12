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
	
	
	function toEditModulePage(id) {
	//alert(id);
		document.getElementById('moduleId').value=id;
		var frm = $('#editForm');
		frm.submit();
	}
	
	function changeStatusTo(id, status) {
	//alert(id);
		$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=changeModuleStatus&moduleId="+id+"&status="+status,

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
	
		function deleteModule(x) {
		var r=confirm("Are you sure? you want to delete this lesson");
		if (r==true)
		{
			$.ajax({
            // The link we are accessing.
            url : "moduleOperations.php?action=deleteModule&moduleId="+x,

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
					$('#tr'+x).html("");
                    $('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Success!</strong> You have successfully delete the module.</div>');
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
            <li id="nav01" class="selected"><a href="">Module Management</a></li>
            <li id="nav02" ><a href="contentManagement.php">Content Management</a></li>
            <li id="nav03" ><a href="user_mgt.php">User Management</a></li>
            <li id="nav04" ><a href="reporting.html">Reporting</a></li>
          </ul>
        </div>
        <!-------end MAINNAV DIV ----------> 
        
      </div>
      <!-------end header div ---------->
      
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
		  
		  <?php
			include "config/conn.php";

			$sql = "SELECT * FROM module";
			//echo $sql;
			$result = @mysql_query($sql);


			while($row = mysql_fetch_array($result)){	

			echo "<tr height='60' id='tr$row[0]'>";
				echo "<td >$row[1]</td> ";
				echo "<td>$$row[5]</td>";
				if ($row[3]==1) {
					echo "<td id='st$row[0]'>Active</td>";
					
					echo "<td id='stlink$row[0]'><a onclick='changeStatusTo($row[0], 0)'>Deactivate</a></td>";
				} else {
					echo "<td id='st$row[0]'>Deactivate</td>";
					echo "<td id='stlink$row[0]'><a onclick='changeStatusTo($row[0], 1)'>Active</a></td>";
				}
				
				
				echo "<td width='48' style='color:#666; font-weight:700'><a onclick='toEditModulePage($row[0]);' href='#'><img src='images/edit.png' width='30' height='30' /></a></td>";
				echo "<td width='243' style='color:#666; font-weight:700'><a onclick='deleteModule($row[0])' ><img src='images/no.png' width='30' height='30' /></a></td>";
			echo "</tr>";

			}
			?>
		  
          <tr>
            <td ></td>
            
            <td></td>
            
            <td></td>
            <td ></td>
            <td></td>
          </tr>
           
            </table>
            <form action="addmodule.html">
            
         <input type="submit" class="btn btn-success" value="New module"  />
         </form>
		 <form name="editForm" id="editForm" action="editmodule.php">
            <input id="moduleId" name="moduleId" type="hidden">
			
         
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
