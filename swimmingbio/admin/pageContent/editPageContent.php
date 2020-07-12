<?php
include "config/conn.php";


$pageId = $_REQUEST['pageId'];


$sql = "SELECT * FROM page WHERE ID = '$pageId'";
//echo $sql;
$result = @mysql_query($sql);


$row = @mysql_fetch_row($result);
//echo "Result is".$row[1];
	
echo "<td ><input id='title' name='title' onChange='submitForm()' type='text' value='$row[2]' placeholder='Title' required='required' class='input-xlarge' >";
echo "<input id='pageId' name='pageId' type='hidden' value='$row[0]' ></td>";
?>


