<?php
include("connection.php");

if(isset($_POST['adduser']))
{
	$stdname=$_POST['stdname'];
	$stddep=$_POST['stddep'];
	$stdstage=$_POST['stdstage'];
	$stdshift=$_POST['stdshift'];
	$stdmail=$_POST['stdmail'];
	$stdnumber=$_POST['stdnumber'];

	
	
	
	//check for exist or not
	$check_dublicate_record="SELECT `StudentName` FROM `students` WHERE `StudentName` = '$stdname' ";
	$result_exist=mysqli_query($conn,$check_dublicate_record);
	$count_check_dublicate_result=mysqli_num_rows($result_exist);
	if ($count_check_dublicate_result>0) {

		//exist
		?>
		<script type="text/javascript">alert("Data Already Exist,Press  Ok To back to previus Page");
		window.open('students.php','_self');
	</script>
		

		<?php
	}
	else
	{
		//not exist insert
		$sql=mysqli_query($conn,"INSERT INTO `students`(`StudentName`, `StudentEmail`, `StudentPassword`, `StudentPhone`, `StudentDepartment`, `StudentShift`, `StudentStage`) VALUES ('$stdname','$stdmail','123','$stdnumber','$stddep','$stdshift','$stdstage') ");
	if($sql)
	{
		echo "<script>window.open('students.php','_self');</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong please check your informations or network and try again');</script>";
	}
	}
	
	
}


if(isset($_POST['updatestubtn']))
{
	$stdname=$_POST['stdname'] ;
	$stddep=$_POST['stddep'];
	$stdstage=$_POST['stdstage'];
	$stdshift=$_POST['stdshift'];
	$stdmail=$_POST['stdmail'];
	$stdnumber=$_POST['stdnumber'];
	$stdpass1=$_POST['stdpass'];
	$id=$_POST['id'];
//check for exist or not
	
	
	$sql1=mysqli_query($conn,"UPDATE students SET StudentName='$stdname', StudentEmail='$stdmail', StudentPassword='$stdpass1',StudentPhone='$stdnumber',StudentDepartment='$stddep', StudentShift='$stdshift', StudentStage='$stdstage'
	WHERE StudentID='$id' ");

	if($sql1)
	{
	echo "<script>window.open('students.php','_self');</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong please check your informations or network and try again');</script>";
	}

	
}


//DELETE UPDATE RECORD

if(isset($_POST['deletebtn']))
{
	$id=$_POST['id'];

	
	$sql2=mysqli_query($conn,"DELETE FROM students	WHERE StudentID='$id' ");

	if($sql2)
	{
	echo "<script>window.open('students.php','_self');</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong please check your informations or network and try again');</script>";
	}
	
}







?>