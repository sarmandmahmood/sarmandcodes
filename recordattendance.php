<?php
session_start();
if(isset($_SESSION["teacher_name"]) || isset($_SESSION["login_account"]))
{
	if(isset($_SESSION["teacher_name"]))
	{
	$tid=$_SESSION["teacher_id"];
	}
}
else
{
	header("location:index.php");
}
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en" style="background-color:#FFFFFF;">
<head>
<meta charset="utf-8" />
<title>ASAS | Teacher Dashboard</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/font.css" type="text/css" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<script src="js/jQuery-2.1.4.min.js"></script>
</head>
<body style="background-color:#FFFFFF;">

<div class="content">
<div class="col-sm-12 col-md-12"></br></div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-sm-offset-3" style="margin-left: 25%;">
 <fieldset>
<form action="att.php" method="GET" role="form">
 <legend>Attendance Information: <?php if(isset($_SESSION["teacher_name"])){ ?><span class="pull-right h5">
 	<input type="hidden" name="teacher" value="<?php echo $_SESSION["teacher_id"]; ?>"><?php echo $_SESSION["teacher_name"]; ?> <a href="logout.php">[ Logout ]</a></span><?php } else { ?> 
 <span class="col-md-4 pull-right">
<select class="form-control" style="height:34px" name="teacher" required="required">
<option selected disabled>Teacher</option>
 				  <?php 
				  $teacherlist=mysqli_query($conn,"SELECT * FROM teachers");
				  while($row=mysqli_fetch_array($teacherlist))
				  {
				  ?>
				  <option value="<?php echo $row["TeacherID"];?>"><?php echo $row["TeacherName"];?></option>
				  <?php
				  }
				  ?>
</select> 
</span>
 <?php } ?>
 </legend>
 <?php
 $techdep=mysqli_query($conn,"SELECT * FROM teachers WHERE TeacherID ='$tid'");
 while($trow=mysqli_fetch_array($techdep)){
	 echo "<input type=hidden name=teachdep value=".$trow["TeacherDepartment"].">";
 }
 ?>
	<div class="col-md-12">
		<div class="col-md-4">
			<select class="form-control" name="stage" id="stage" required style="height:34px">
				<option selected disabled >Stage</option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
			</select>
		</div>
				<div class="col-md-4">
						<select class="form-control" name="subject" id="subject" style="height:34px">
								<option selected disabled>Subject</option>
						</select>
				</div>



				<div class="col-md-4">
						<select class="form-control" name="shift" required="required" style="height:34px">
							<option>Shift</option>
								<?php
								$shiftsql=mysqli_query($conn,"SELECT * FROM shifts");
								while($shrow=mysqli_fetch_array($shiftsql))
								{
								echo "<option value=".$shrow["ShiftID"].">".$shrow["ShiftName"]."</option>";
								}
									?>
						</select>
				</div>
	</div>
	<br>
	<br>
	<br>
	<div class="col-md-12">
		<div class="col-md-6">
			<label>Attendance Date:</label>
			<input type="date" class="form-control" name="date" value="<?php echo DATE("Y-m-d"); ?>">
		</div>
				<div class="col-md-6">
				<label>Attendance Time:</label>

			<input type="time" class="form-control" name="time" value="<?php echo date("H:i:s"); ?>" >
		</div>
	</div>
	
	
 <div class="pull-right"><input type="submit" class="btn btn-info" style="margin-right: 30px; margin-top:5px;"  value="Take Attendance"></div>
</form>
</fieldset>
</br></br>
<?php if(isset($_SESSION["teacher_id"])){ ?>
<table class="table table-primary table-bordered" style="font-size:13px;width:100%;">
<tr style="background-color: #2196F3;color: white;" >
<th>#</th>
<th>Subject Name</th>
<th>Date</th>
<th>Time</th>
<th>Stage</th>
<th>Shift</th>
<th>Action</th>
</tr>
<?php
$datee=date("Y/m/d");
$rettod=mysqli_query($conn,"SELECT * FROM attendances,subjects,stages,shifts WHERE AttendanceSubject=SubjectID AND AttendanceStage=StageID AND AttendanceShift=ShiftID AND AttendanceDate='$datee' AND AttendanceTeacher='$tid'");
while($rows=mysqli_fetch_array($rettod))
{
	echo "<tr>";
	echo "<td>".$rows["AttendanceID"]."</td>";
	echo "<td><b>".$rows["SubjectName"]."</b></td>";
	echo "<td>".$rows["AttendanceDate"]."</td>";
	echo "<td>".$rows["AttendanceTime"]."</td>";
	echo "<td>".$rows["StageName"]."</td>";
	echo "<td>".$rows["ShiftName"]."</td>";
	echo "<td><a href='attendanceprint.php?attid=".$rows["AttendanceID"]."' target='_blank'><button class='btn btn-xs'><span class='fa fa-print'></span> Print</button></a> &nbsp; <a href='attendanceedit.php?attid=".$rows["AttendanceID"]."' target='_blank'><button class='btn btn-xs'><span class='fa fa-edit'></span>Edit</button></a></td>";
	echo "</tr>";
}
?>
</table>
<?php } ?>
</div>
</div>
<script type="text/javascript">
$(document).ready(function()
{
$("#stage").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;
 
$.ajax
({
type: "POST",
url: "fetch.php",
data: post_id,
cache: false,
success: function(cities)
{
$("#subject").html(cities);
} 
});
 
});
});
</script>
</div>
</body>
</html>