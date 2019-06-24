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
<title>ASAS | Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/font.css" type="text/css" />
<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
      <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/buttonsstyles.css">
<script src="js/jQuery/jQuery-2.1.4.min.js"></script>

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
<li class="">
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
<li class="active">Users</li>
</ul>
<div class="m-b-md">

<h3 class="m-b-none">Users</h3>
<small></small>
</div>


<section>
<div class="row">
  <div class="col-sm-3 col-md-3">
<div class="form-group">
<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search By Name...">
</div>
</div>
<div class="pull-right" style="margin-right: 15px;">
                                      <button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>

<button class="btn btn-blue" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> New</button>
</div>
</div>

</section>


<section class="panel panel-default" id="PrintTable">
<div class="row m-l-none m-r-none bg-light lter" style="background: white;border:1px grey solid;">
<div class="col-sm-12 col-md-12 padder-v b-r b-light">
<table class="table  m-b-none " >
<thead>
<tr>
<th>#</th>
<th>User Name</th>
<th>Email</th>
<th >Phone Number</th>
<th >Password</th>
<th >Last Login</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$usersql=mysqli_query($conn,"SELECT * FROM users");
while($urow=mysqli_fetch_array($usersql))
{
?>
<tr>
<td width="100px"><?php echo $urow["UserID"]; ?></td>
<td><?php echo $urow["UserName"]; ?></td>
<td><?php echo $urow["UserEmail"]; ?></td>
<td><?php echo $urow["UserPhone"]; ?></td>
<td><?php echo("*******")?></td>

<td ><?php echo $urow["UserLastLogin"]; ?></td>
<td width="200px">
<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $urow["UserID"]; ?>" id="edituser"><i class="fa fa-edit"></i> Edit</button>
<button class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#deletemodal" data-id="<?php echo $urow["UserID"]; ?>" id="dltuser"><i class="fa fa-trash-o"></i> Delete</button>
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




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form action="user_functions.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		<input type="text" class="form-control" placeholder="Full Name" name="fullname" required="Yes">
		</div>
        <div class="form-group">
		<input type="text" class="form-control" placeholder="Email Address" name="useremail" required="Yes">
		</div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Phone Number" name="phonenbr" required="Yes">
    </div>
        <div class="form-group">
		<input type="password" class="form-control" placeholder="Password" name="password" required="Yes">
		</div>
        <div class="form-group">
		<!--<select class="form-control" name="level" required="Yes">
		<option disabled selected>Role</option>
		<option>Administrator</option>
		<option>Modirator</option>
		</select>-->
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="adduser">Add User</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  <form action="user_functions.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item Information</h5>
        </button>
      </div>
      <div class="modal-body">
    <div id="dynamic-content10"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="updateuser">Update Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Upadte Script-->
<script>
$(document).ready(function(){
  $(document).on('click', '#edituser', function(e){
    e.preventDefault();
    var uid = $(this).data('id');
    $('#dynamic-content10').html('');
    $.ajax({
      url: 'editusers.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-content10').html('');    
      $('#dynamic-content10').html(data);
    })
    .fail(function(){
      $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
  });
});
</script>

  
<!--DELETE STUDENT INFO -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  <form action="functions.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        </button>
      </div>
      <div class="modal-body">
    <div id="dynamic-content2"></div>
    
      </div>
      <div class="modal-footer">
        <!-- PHP SCRIPT  updatestudent.php-->
        <a href="users.php?update=<?php echo $row['id']; ?>"></a>
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
  $(document).on('click', '#dltuser', function(e){
    e.preventDefault();
    var uid = $(this).data('id');
    $('#dynamic-content2').html('');
    $.ajax({
      url: 'deleteusers.php',
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


<script type="text/javascript">   
    function printData() {
        var divToPrint=document.getElementById("PrintTable");
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


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
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