<?php


include "../config/conn.php";


$videoTitle = $_REQUEST['videoTitle'];


$sql = "INSERT INTO video(TITLE)VALUES('$videoTitle')";
//echo $sql;
$result = @mysql_query($sql);
if($result==1) {
$fileName = mysql_insert_id();

$allowedExts = array("flv", "mp4", "wmv", "wav");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (in_array($extension, $allowedExts))
  {
	if ($_FILES["file"]["error"] > 0)
	  {
	  echo "ERROR";
	  }
	else
	  {
	  
	  
		if (file_exists("videos/" . $_FILES["file"]["name"]))
		  {
		  echo "ERROR";
		  }
		else
		  {
		  move_uploaded_file($_FILES["file"]["tmp_name"], "videos/" . $fileName.".$extension");
		  echo $fileName;
		  }
	  
	  }
  } else  {
	echo "ERROR";
  }

} else {
echo "ERROR";
}




?> 