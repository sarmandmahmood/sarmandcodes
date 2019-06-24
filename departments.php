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
<title>ASAS | Departments</title>
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
<header class="nav-color dk header navbar navbar-fixed-top-xs"><header class=" header navbar navbar-fixed-top-xs" style="background-color:#1abc9c;"> 
	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"><i class="fa fa-bars"></i></a>
<a href="#" class="navbar-brand" data-toggle="fullscreen" style="color: white;"><img src="images/logo.png" class="m-r-sm" >LFU - ASAS</a>
<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
</header>

</header>
<section>
<section class="hbox stretch">

<aside class="nav-color lter aside-md hidden-print hidden-xs" id="nav">
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
<li class="active">Departments</li>
</ul>
<div class="m-b-md">

<h3 class="m-b-none">Departments</h3>
</div>








<section>
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<div class="input-group m-b col-md-5">
<input type="text" class="form-control rounded" id="myInput" onkeyup="myFunction()" placeholder="Department Name...">
</div>

</div>
</div>

<div class="pull-right" style="margin-right: 15px;">
<button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>
<button class="btn btn-add" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> New</button>

</div>
</div>

</section>


<section class="panel panel-default"  id="printTable" >
<div class="row m-l-none m-r-none  lter" style="background: white;border:1px grey solid;">
<div class="col-sm-12 col-md-12 padder-v b-r b-light">
 <table class="table  m-b-none  " id="printTable">
<thead>
<tr>
<th>#</th>
<th>Departmnet Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$Count=0;


$sqlget=mysqli_query($conn,"SELECT * FROM departments");
while($row=mysqli_fetch_array($sqlget))
{
	$Count++;
?>
<tr>
<td width="100px"><?php echo $row["DepartmentID"]; ?></td>
<td><?php echo $row["DepartmentName"]; ?></td>

<td width="250px">
<button class="btn btn-xs btn-edit" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $row["DepartmentID"]; ?>" id="editstudent"><i class="fa fa-edit"></i> Edit</button>
<button class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#deletemodal" data-id="<?php echo $row["DepartmentID"]; ?>" id="deletestudent"><i class="fa fa-trash-o"></i> Delete</button>
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











<!--ADDING STUDNET FORM -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="dept-function.php" method="POST">
		<input type="hidden" name="id" va></input>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
        </button>
      </div>
      <div class="modal-body">
	  <table class="table table-striped table-bordered table-hover">
	  <tr>
	  <th>Department Name</th>
	  <td><input required="Yes" type="text" class="form-control" name="stdname"></td>
	  </tr>
	
	

	  </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="adduser">Add Department</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>



<!--UPDATE STUDENT INFO -->

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="dept-function.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item Information</h5>
        </button>
      </div>
      <div class="modal-body">
		<div id="dynamic-content"></div>
		
      </div>
      <div class="modal-footer">
      	<!-- PHP SCRIPT  updatestudent.php-->
      	<a href="stundets.php?update=<?php echo $row['id']; ?>"></a>
        <button type="submit" class="btn btn-success" name="updatestubtn">Update Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>


<!--DELETE Department INFO -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="dept-function.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        </button>
      </div>
      <div class="modal-body">
		<div id="dynamic-content2"></div>
		
      </div>
      <div class="modal-footer">
      	<!-- PHP SCRIPT  updatestudent.php-->
      	<a href="departments.php?update=<?php echo $row['id']; ?>"></a>
        <button type="submit" class="btn btn-danger" name="deletebtn">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>





<!-- UPDATE SCRIPT-->

<script>
$(document).ready(function(){
	$(document).on('click', '#editstudent', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content').html('');
		$.ajax({
			url: 'editdepartment.php',
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




<!-- DELETE SCRIPT-->

<script>
$(document).ready(function(){
	$(document).on('click', '#deletestudent', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content2').html('');
		$.ajax({
			url: 'deletedepartment.php',
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



<script>
$(document).ready(function(){
	$(document).on('click', '#showstudent', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content2').html('');
		$.ajax({
			url: 'showstudent.php',
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
    <script src="js/app.plugin.js"></script>