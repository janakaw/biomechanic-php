<?php
include "config/conn.php";


$moduleId = $_REQUEST['moduleId'];


$sql = "SELECT * FROM page WHERE MODULE_ID = $moduleId";
//echo $sql;
$result = @mysql_query($sql);


while($row = mysql_fetch_array($result)){	


echo "<tr height='60' id='tr$row[0]'>";
    echo "<td >$row[2]</td> ";
	if ($row[3]==1) {
		echo "<td id='st$row[0]'>Active</td>";
		echo "<td id='stlink$row[0]'><a onclick='changePageStatusTo($row[0], $row[1], 0)' >Deactivate</a></td>";
	} else {
		echo "<td id='st$row[0]'>Deactivate</td>";
		echo "<td id='stlink$row[0]'><a onclick='changePageStatusTo($row[0], $row[1], 1)' >Active</a></td>";
	}
    
    
    echo "<td width='48' style='color:#666; font-weight:700'><a onclick='editPage($row[1], $row[0])' href='#'><img src='images/edit.png' width='30' height='30' /></a></td>";
    echo "<td width='243' style='color:#666; font-weight:700'><a onclick='deletePage($row[0])' href='#'><img src='images/no.png' width='30' height='30' /></a></td>";
echo "</tr>";

}
?>





