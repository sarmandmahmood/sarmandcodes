<?php
include("connection.php");
$stage=$_POST['astage'];
$subject=$_POST['asubject'];
$shift=$_POST['ashift'];
$date=$_POST['adate'];

$student=$_POST['student'];

$sql=mysqli_query($conn,"INSERT INTO `studentattendances`(`stdAttendanceStudent`) values('$student')");
if($sql) {echo $sql;}
else
{
	
}


?>