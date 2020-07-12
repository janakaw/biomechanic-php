<?php
include "config/conn.php";


$chapterId = $_REQUEST['chapterId'];


$sql = "SELECT * FROM chapter WHERE ID = '$chapterId'";
//echo $sql;
$result = @mysql_query($sql);


$row = @mysql_fetch_row($result);
//echo "Result is".$row[1];
	
echo "<td ><input id='title' name='title' onChange='submitForm()' type='text' value='$row[2]' placeholder='Title' required='required' class='input-xlarge' >";
echo "<input id='chapterId' name='chapterId' type='hidden' value='$row[0]' ></td>";
?>


