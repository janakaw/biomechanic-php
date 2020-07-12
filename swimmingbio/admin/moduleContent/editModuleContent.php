<?php
include "config/conn.php";


$moduleId = $_REQUEST['moduleId'];


$sql = "SELECT * FROM module WHERE ID = $moduleId";
//echo $sql;
$result = @mysql_query($sql);


$row = @mysql_fetch_row($result);
//echo "Result is".$row[1];
	
	echo "<td><input id='title' name='title' onChange='submitForm()' type='text' value='$row[1]' placeholder='Title' required='required' class='input-xlarge' ></td>";
    echo "<td><input id='price' name='price' onChange='submitForm()'  type='text' value='$row[5]' placeholder='Price' required='required' class='input-xlarge' style='width:50px;'></td>";
    echo "<td><select id='subscribeType' name='subscribeType' onChange='submitForm()' class='input-xlarge'> ";
	echo "<option>$row[2]</option>";
	if ($row[2] == "Option two") {
		echo "<option>1 year from payment</option>";
	} else {
		echo "<option>Option two</option>";
	}
		
		
	echo "</select>";
	echo "</td>";
	
	
?>


