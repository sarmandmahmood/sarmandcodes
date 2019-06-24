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
<title>ASAS | Students</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/font.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/buttonsstyles.css">
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
<a href="Dashboard.php" class="active"><i class="fa fa-dashboard icon"></i><span style="color:#23527c;;">Dashboard</span> </a>
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
<li><a href="Dashboard.php"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Students</li>
</ul>
<div class="m-b-md">

<h3 class="m-b-none">Students</h3>
<small>Student Information Management</small>
</div>







                            <section>
                                <div class="row">
                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search By Name...">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <form action="?" method="GET">
                                                <select class="form-control" name="department" onchange="this.form.submit();">
                                                    <option selected="" disabled="" >Department</option>
                                                    <?php
$depsql=mysqli_query($conn,"SELECT * FROM departments");
$departmentcode="";
$selecteddep="";
if(isset($_GET["department"])){
$departmentcode="AND StudentDepartment=".$_GET["department"];
if($_GET["department"]==$stgrow["DepartmentID"])
{ $selecteddep="selected";}
else
{ $selecteddep="";}
}
while($deprow=mysqli_fetch_array($depsql)){
	$selected="";
if(isset($_GET["statuss"])){
if($_GET["department"]==$stgrow["DepartmentID"])
{ $selected="selected";}
else
{ $selected="";}
}
	echo "<option value=".$deprow['DepartmentID']." ".$selecteddep.">".$deprow['DepartmentName']."</option>";}
?>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <form action="" method="GET">
                                                <select class="form-control" name="statuss" onchange="this.form.submit();">
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
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <form action="?" method="GET">
                                                <select class="form-control" name="batchsname" onchange="this.form.submit();">
                                                    <option selected="" disabled="">Shifts</option>
                                                    <?php
$depsql=mysqli_query($conn,"SELECT * FROM shifts");
$shiftcode="";
$selecteddep="";
if(isset($_GET["batchsname"])){
$shiftcode="AND StudentShift=".$_GET["batchsname"];
if($_GET["batchsname"]==$stgrow["ShiftID"])
{ $selecteddep="selected";}
else
{ $selecteddep="";}
}
while($deprow=mysqli_fetch_array($depsql)){
	$selected="";
if(isset($_GET["statuss"])){
if($_GET["batchsname"]==$stgrow["ShiftID"])
{ $selected="selected";}
else
{ $selected="";}
}
	echo "<option value=".$deprow['ShiftID']." ".$selecteddep.">".$deprow['ShiftName']."</option>";}
?>
                                                </select>
                                            </form>
                                        </div>
                                    </div>

                                     <div class="pull-right" style="margin-right: 17px; margin-bottom: 10px;">
                                    <button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>
                                    <button class="btn btn-add " data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> New</button>

                                </div>


                                </div>
                            </section>


<section class="panel panel-default"  id="printTable" >
<div class="row m-l-none m-r-none  lter" style="background: white;border:1px grey solid;">
<div class="col-sm-12 col-md-12 padder-v b-r b-light">
<table class="table  m-b-none ">
<thead>
<tr>
<th>#</th>
<th>Student Name</th>
<th>Department</th>
<th>Shift</th>
<th>Stage</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php

$stagecode="";	
if(isset($_GET["statuss"])){
$stagecode="AND StudentStage=".$_GET["statuss"];
}

$sqlget=mysqli_query($conn,"SELECT * FROM students,shifts,departments,stages WHERE StudentDepartment=DepartmentID AND StudentShift=ShiftID AND StudentStage=StageID ".$stagecode." ".$departmentcode." ".$shiftcode."  ");
while($row=mysqli_fetch_array($sqlget))
{
	
?>
<tr>
<td width="100px"><?php echo $row["StudentID"]; ?></td>
<td><?php echo $row["StudentName"]; ?></td>
<td><?php echo $row["DepartmentName"]; ?></td>
<td><?php echo $row["ShiftName"]; ?></td>
<td><?php echo $row["StudentStage"]; ?></td>

<td width="250px">
<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $row["StudentID"]; ?>" id="editstudent"><i class="fa fa-edit"></i> Edit</button>
<button class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#deletemodal" data-id="<?php echo $row["StudentID"]; ?>" id="deletestudent"><i class="fa fa-trash-o"></i> Delete</button>
</td>
</tr>
<?php
}
?>
</tbody>

</table>
</div>
</div>
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












<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="addstudent.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
        </button>
      </div>
      <div class="modal-body">
	  <table class="table table-striped table-bordered table-hover">
	  <tr>
	  <th>Student Name</th>
	  <td><input required="Yes" type="text" class="form-control" name="stdname"></td>
	  </tr>
	  <tr>
	  <th>Department</th>
	  <td>
	 
	  <div class="col-md-6">
	  <select  required="Yes" class="form-control" name="stddep">
	  <?php $dep=mysqli_query($conn,"select * from departments");
	  while($deprow=mysqli_fetch_array($dep))
	  {?>

	  <option  value="<?php echo $deprow["DepartmentID"]; ?>"> <?php echo $deprow["DepartmentName"]; ?></option>
		<?php }?>
	  </select>
	  </div>
	  </td>
	  </tr>
	  
	  <tr>
	  <th>Stage/Shift</th>
	  <td>
	  <div class="col-md-6">
	  <select required="Yes" class="form-control" name="stdstage"><option>Stage</option>
	  <?php 
		$stgsql=mysqli_query($conn,"SELECT * FROM stages");
		while($stgrow=mysqli_fetch_array($stgsql))
		{
	  ?>
	  <option  value="<?php echo $stgrow['StageID'];  ?>"><?php  echo $stgrow['StageName']; ?></option>
	  <?php }?>
	  </select>
	  </div>
	  <div class="col-md-6">
	  <select required="Yes" class="form-control" name="stdshift">
	  <?php 
		$sh=mysqli_query($conn,"select * from shifts");
		while($shrow=mysqli_fetch_array($sh))
		{
	  ?>
	  <option value="<?php  echo $shrow['ShiftID']; ?>"> <?php  echo $shrow['ShiftName'];  ?></option>
	  <?php }?>
	  </select>
	  </div>
	  </td>
	  </tr>
	  <tr>
	  <th>E-Mail Address</th>
	  <td><input required="Yes" type="text" class="form-control" name="stdmail"></td>
	  </tr>
	  <tr>
	  <th>Phone Number</th>
	  <td><input required="Yes" value="" type="text" class="form-control" name="stdnumber"></td>
	  </tr>
	    <tr>
	  <th>Password</th>
	  <td><input required="Yes" type="Password" placeholder="Enter Password " value="" class="form-control" name="stdpass"></td>
	  </tr>
	  </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="adduser">Add Student</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>




<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="addstudent.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item Information</h5>
        </button>
      </div>
      <div class="modal-body">
		<div id="dynamic-content">
			

		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="updatestubtn">Update Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>




<!--DELETE STUDENT INFO -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="addstudent.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        </button>
      </div>
      <div class="modal-body">
		<div id="dynamic-content2"></div>
		
      </div>
      <div class="modal-footer">
      	<!-- PHP SCRIPT  updatestudent.php-->
      	<a href="stundets.php?update=<?php echo $row['id']; ?>"></a>
        <button type="submit" class="btn btn-danger" name="deletebtn">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>





<!-- DELETE SCRIPT-->

<script>
$(document).ready(function(){
	$(document).on('click', '#deletestudent', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content2').html('');
		$.ajax({
			url: 'deletestudent.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content2').html('');    
			$('#dynamic-content2').html(data);
		})
		.fail(function(){
			$('#dynamic-content2').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
	});
});
</script>


<!-- Upadte Script-->
<script>
$(document).ready(function(){
	$(document).on('click', '#editstudent', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content').html('');
		$.ajax({
			url: 'editstudent.php',
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
<script src="js/jQuery-2.1.4.min.js"></script>
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