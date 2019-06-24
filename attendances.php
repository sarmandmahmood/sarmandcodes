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
<title>ASAS | Attendance</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="css/font.css" type="text/css" />
      <link rel="stylesheet" href="js/fuelux/fuelux.css" type="text/css" />
      <link rel="stylesheet" href="js/fullcalendar/fullcalendar.css" type="text/css" />
      <link rel="stylesheet" href="js/fullcalendar/theme.css" type="text/css" />
      <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
      <link rel="stylesheet" href="css/sb-admin-2.css" type="text/css" />

      <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />

<!--[if lt IE 9]>
<script src="js/ie/html5shiv.js"></script>
<script src="js/ie/respond.min.js"></script>
<script src="js/ie/excanvas.js"></script>
<![endif]-->
</head>
<body class="">
<section class="vbox">
<header class=" header navbar navbar-fixed-top-xs" style="background-color:#1abc9c;"> <div class="navbar-header aside-md">

	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"><i class="fa fa-bars"></i></a>
<a href="#" class="navbar-brand" data-toggle="fullscreen" style="color: white;"><img src="images/logo.png" class="m-r-sm" >LFU - ASAS</a>
<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
</div>
</header>
<section>
<section class="hbox  stretch">

<aside class=" lter aside-md hidden-print hidden-xs" id="nav">
<section class="vbox ">

<section class="w-f scrollable">
<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

<nav class="nav-primary hidden-xs">
                                    <ul class="nav">
                                        <li class="active">
                                            <a href="Dashboard.php" class="active"><i class="fa fa-dashboard icon"></i><span style="color:#23527c;;">Dashboard</span> </a>
                                        </li>

                                        <li>
                                            <a href="students.php"> <i class="fa fa-users icon"> </i> <span>Students</span> </a>
                                        </li>
                                        <li>
                                            <a href="departments.php"> <i class="fa fa-building"></i> <span>Departments</span> </a></li>
                                        </li>
                                        <li>
                                            <a href="#uikit"><i class="fa fa-briefcase icon"> </i><span class="pull-right"><i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span><span>Teachers</span></a>
                                            <ul class="nav lt">
                                                <li><a href="teachers.php"> <i class="fa fa-angle-right"></i> <span>Teachers</span> </a></li>

                                                <li><a href="subjects.php"> <i class="fa fa-angle-right"></i> <span>Subjects</span> </a></li>
                                            </ul>
                                        </li>


                                        <li>
                                            <a href="attendances.php"> <i class="fa fa-paste icon"> </i><span>Attendances</span></a>
                                        </li>


                                        <li>
                                            <a href="users.php"> <i class="fa fa-users icon"> </i><span>Users</span>
                                            </a>
                                        </li>
                                        <li class="active">
<a href="settings.php" > <i class="fa fa-cogs icon"> </i><span>Settings</span>
                                        </a>
                                        </li>
                                        <li>
                                            <a href="logout.php"> <i class="fa fa-power-off icon"> </i><span>Logout</span>
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
<li><a href="Dashboard.php"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Attendance</li>
</ul>
<div class="m-b-md">

<h3 class="m-b-none">Attendance</h3>
<small>Student Attendance Management</small>
</div>


<section class="hbox stretch">
                     <!-- .aside --> 
                     <aside>
                        <section class="vbox">
                           <section class="scrollable wrapper">
						   
						   
						   
						   
						   
						   
						   
						   
<section>
<div class="row">
<div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search By Name...">
                                        </div>
                                    </div>
<div class="col-sm-4 col-md-3">
<div class="form-group">
<form action="?" method="GET">
<input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d"); ?>" onchange="this.form.submit();">
</form>
</div>
</div>
<div class="col-sm-4 col-md-3">
<div class="form-group">
<form action="" method="GET">
<select class="form-control" name="stage" onchange="this.form.submit();">
<option selected="" disabled="">Stage</option>
<?php
$stgsql=mysqli_query($conn,"SELECT * FROM stages");
$selected="";
if(isset($_GET["statuss"])){
if($_GET["statuss"]==$stgrow["StageID"])
{ $selected="selected";}
else
{ $selected="";}
}
while($stgrow=mysqli_fetch_array($stgsql)){
	$selected="";
if(isset($_GET["statuss"])){
if($_GET["statuss"]==$stgrow["StageID"])
{ $selected="selected";}
else
{ $selected="";}
}
	echo "<option value=".$stgrow['StageID']." ".$selected.">".$stgrow["StageName"]."</option>";}
?>
</select>
</form>
</div>

</div><div >
<button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>
</div>
</div>
</section>
						   



                              <section class="panel panel-default" id="printTable" >
                                <table class="table table-bordered table-hover">
								<tr class="success">
								<th>#</th>
								<th>Subject Name</th>
								<th>Teacher Name</th>
								<th>Stage</th>
								<th>Shift</th>
								<th>Date</th>
								<th>Time</th>
								<th>Action</th>
								</tr>
								<?php
								if(isset($_GET["date"]))
								{
									$datee=$_GET["date"];
								}
								else
								{
								$datee=date("Y/m/d");
								}
								if(isset($_GET["stage"]))
								{
									$sssqqq="AND AttendanceStage=".$_GET["stage"];
								}
								else
								{
									$sssqqq="";
								}
								
								$rettod=mysqli_query($conn,"SELECT * FROM attendances,subjects,stages,shifts,teachers 
									WHERE 
									AttendanceSubject=SubjectID 
									AND AttendanceStage=StageID 
									AND AttendanceShift=ShiftID
								    AND AttendanceDate='$datee' 
									AND AttendanceTeacher=TeacherID  ".$sssqqq."   "
							);
								if($rettod)
								{}
								else{
								echo mysqli_error($conn);
								}
								while($rows=mysqli_fetch_array($rettod))
								{	echo mysqli_error($conn);
									echo "<tr>";
									echo "<td>".$rows["AttendanceID"]."</td>";
									echo "<td>".$rows["SubjectName"]."</td>";
									echo "<td>".$rows["TeacherName"]."</td>";
									echo "<td>".$rows["StageName"]."</td>";
									echo "<td>".$rows["ShiftName"]."</td>";
									echo "<td>".$rows["AttendanceDate"]."</td>";
									echo "<td>".$ddtt=$rows["AttendanceTime"]."</td>";
									echo "<td><a href='attendanceprint.php?attid=".$rows["AttendanceID"]."' target='_blank'><button class='btn btn-xs btn-primary'><span class='fa fa-print'></span> Print</button></a> &nbsp; <a href='attendanceedit.php?attid=".$rows["AttendanceID"]."' target='_blank'><button class='btn btn-xs btn-info'><span class='fa fa-edit'></span>Edit</button></a></td>";
									echo "</tr>";
								}
								?>
								</table>
                              </section>
							  
							  
							  
                           </section>
                        </section>
                     </aside>
                     <!-- /.aside --> <!-- .aside --> 
                     <aside class="aside-lg b-l">
                        <div class="padder">
                           <h5>Tools</h5>
                           <div class="line"></div>
                           <a href="attendancemonth.php">
						   <div style="background-color:#373A49; color:#FFFFFF; text-align:center; padding:50px 5px 50px 5px;">
						   <span style="font-family:tahoma; font-size:20px;">Attendance Calendar</span>
						   </div>
						   </a>
                           <div class="line"></div>
						
                           <div class="line"></div>
                        </div>
                     </aside>
                     <!-- /.aside --> 
                  </section>



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

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("printTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
<script src="js/app.v1.js"></script>
<script src="js/fuelux/fuelux.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/fullcalendar/fullcalendar.min.js"></script>
<script src="js/fullcalendar/demo.js"></script>
<script src="js/app.plugin.js"></script>


</body></html>