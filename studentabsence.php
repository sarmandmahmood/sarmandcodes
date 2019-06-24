<?php
session_start();
if(isset($_SESSION["login_account"]))
{
}
else
{
	header("location:login.php");
}
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Attendance Manager System | Students</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/font.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />

<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<script src="js/jQuery-2.1.4.min.js"></script>

<!--[if lt IE 9]>
<script src="js/ie/html5shiv.js"></script>
<script src="js/ie/respond.min.js"></script>
<script src="js/ie/excanvas.js"></script>
<![endif]-->
</head>
<body class="">
<section class="vbox">
<header class=" header navbar navbar-fixed-top-xs" style="background-color:#1abc9c;"> 
	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"><i class="fa fa-bars"></i></a>
<a href="#" class="navbar-brand" data-toggle="fullscreen" style="color: white;"><img src="images/logo.png" class="m-r-sm" >LFU - ASAS</a>
<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
</header>
<section>
<section class="hbox stretch">

<aside class=" lter aside-md hidden-print hidden-xs" id="nav">
<section class="vbox">

<section class="w-f scrollable">
<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

<nav class="nav-primary hidden-xs">
<ul class="nav" >
<li class="active" >
<a href="index.php" class="active"><i class="fa fa-dashboard icon"></i><span style="color:#23527c;;">Dashboard</span> </a>
</li>

<li>
<a href="students.php" > <i class="fa fa-users icon">  </i> <span>Students</span> </a>
</li>
<li>
  <a href="departments.php" > <i class="fa fa-building"></i> <span>Departments</span> </a></li>
</li>
<li>
<a href="#uikit" ><i class="fa fa-briefcase icon">  </i><span class="pull-right"><i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span><span>Teachers</span></a>
<ul class="nav lt">
<li><a href="teachers.php" > <i class="fa fa-angle-right"></i> <span>Teachers</span> </a></li>

<li><a href="subjects.php" > <i class="fa fa-angle-right"></i> <span>Subjects</span> </a></li>
</ul>
</li>


<li>
<a href="attendances.php" > <i class="fa fa-paste icon"> </i><span>Attendances</span></a>
</li>


<li>
<a href="users.php" > <i class="fa fa-users icon"> </i><span>Users</span>
</a>
</li>
<li class="active">
<a href="settings.php" > <i class="fa fa-cogs icon"> </i><span>Settings</span>
</a>
</li>
<li>
<a href="logout.php" > <i class="fa fa-power-off icon"> </i><span>Logout</span>
</a>
</li>
</ul>
</nav>
</div> </section>

</section>
</aside>

<section id="content">
<section class="vbox white">
<section class="scrollable padder">
<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Attendances</li>
</ul>
<div class="m-b-md">

<?php
$getid=$_GET["stdid"];
$sqlstdret=mysqli_query($conn,"SELECT * FROM students,stages,shifts WHERE StudentID='$getid' AND StudentStage=StageID AND StudentShift=ShiftID");
while($stdrow=mysqli_fetch_array($sqlstdret)){
$stdname=$stdrow["StudentName"];	
$stdstage=$stdrow["StageName"];
$stdshift=$stdrow["ShiftName"];
}
?>
<h3 class="m-b-none"><?php echo $stdname; ?> / <?php echo $stdstage; ?> Stage - <?php echo $stdshift; ?></h3>
<small>Students Attendance Information</small>
</div>

<div class="pull-right">
<button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>
<button class="btn btn-danger"><i class="fa fa-save"></i> Export File As Excell Sheet</button>
</div>
<section>
<div class="row">
<div class="col-sm-6 col-md-4">
<div class="form-group">
<form action="" method="POST">
<select class="form-control" name="statuss" onchange="this.form.submit();">
<option selected="" disabled="">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
</form>
</div>
</div>
</div>
</section>


<div class="row" id="printTable" >
<div class="col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Month Day</th>
<?php
$SID=$_GET["stdid"];
$stdshsql=mysqli_query($conn,"SELECT * FROM students WHERE StudentID='$SID'");
while($rows=mysqli_fetch_array($stdshsql)){$shifttype=$rows["StudentShift"];}
if($shifttype==1)
{
?>
<th>8:30 - 9:30</th>
<th>9:30 - 10:30</th>
<th>10:30 - 11:30</th>
<th>11:30 - 12:30</th>
<th>12:30 - 01:30</th>
<th>01:30 - 02:30</th>
<th>02:30 - 03:30</th>
<th>03:30 - 04:30</th>
<?php
}
else
{
?>
<th>4:30 - 5:30</th>
<th>5:30 - 6:30</th>
<th>6:30 - 7:30</th>
<th>7:30 - 8:30</th>
<th>8:30 - 9:30</th>
<th>9:30 - 10:30</th>
<th>10:30 - 11:30</th>
<th>11:30 - 12:30</th>
<?php
}
?>
</tr>
</thead>
<tbody>
<?php
$maxDays=date('t');
$currentDayOfMonth=date('j');
for($x=1;$x<=$maxDays;$x++)
{
$now = new \DateTime('now');
$month = $now->format('m');
$year = $now->format('Y');
$date = $year."/".$month."/".$x;
$nameOfDay = date('l', strtotime($date));
?>
<tr>
<td <?php if($nameOfDay=="Friday"){?>style="background-color:#F1F19B;"<?php } ?>><?php echo $x."  -   ".$nameOfDay;?></td>
<?php
if($shifttype==1){
	$y=8;
	$z=16;
}
else
{
$y=4;
$z=12;
}
for($y;$y<$z;$y++){
?>


<td <?php if($nameOfDay=="Friday"){?>style="background-color:#F1F19B;"<?php } ?>>
<?php
$sqltimeret=mysqli_query($conn,"SELECT * FROM studentattendances,subjects WHERE HOUR(stdAttendanceTime)='$y' AND stdAttendanceSubject=SubjectID AND stdAttendanceStudent='$getid' AND stdAttendanceDate='$date'");
While($row2=mysqli_fetch_array($sqltimeret)){
if($row2["stdAttendanceStatus"]==1){
?>
<a href="" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $row2["stdAttendanceID"]; ?>" id="editattendance"><span class="badge bg-danger"><?php echo $row2["SubjectName"];?></span></a>
<?php
}
else
{
?>
<a href="" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $row2["stdAttendanceID"]; ?>" id="editattendance"><span class="badge bg-success"><?php echo $row2["SubjectName"];?></span></a>
<?php
}
}
?></td>


<?php } ?>
</tr>
<?php
}
?>




</tbody>
<tfoot>
<tr class="warning">
<th colspan="7"></th>
<?php 
$sqlcountabs=mysqli_query($conn,"SELECT COUNT(*) FROM studentattendances WHERE stdAttendanceStudent='$getid' AND stdAttendanceStatus='1'");
while($crow=mysqli_fetch_array($sqlcountabs))
{
	$countnum=$crow["COUNT(*)"];
}
?>
<th colspan="2">Total : <?php echo $countnum; ?> Absences</th>
</tr>
</tfoot>
</table>

</div>
</div>
</div>


</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>
<aside class="bg-light lter b-l aside-md hide" id="notes">
<div class="wrapper">Notification</div>
</aside>
</section>
</section>
</section>









<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item Information</h5>
        </button>
      </div>
      <div class="modal-body">
		<div id="dynamic-content"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="adduser">Update Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>



<script>
$(document).ready(function(){
	$(document).on('click', '#editattendance', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content').html('');
		$.ajax({
			url: 'editattendance.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data);
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
	});
});
</script>


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>








<script >
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<script src="js/app.v1.js"></script>
<script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
<script src="js/charts/flot/jquery.flot.min.js"></script>
<script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/charts/flot/jquery.flot.resize.js"></script>
<script src="js/charts/flot/jquery.flot.grow.js"></script>
<script src="js/charts/flot/demo.js"></script>
<script src="js/calendar/bootstrap_calendar.js"></script>
<script src="js/calendar/demo.js"></script>
<script src="js/sortable/jquery.sortable.js"></script>
<script src="js/app.plugin.js"></script></body></html>