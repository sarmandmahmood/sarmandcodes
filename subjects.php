
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
    <title>ASAS | Subjects</title>
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
    
    <section class="vbox ">
        <header class="nav-color dk header navbar navbar-fixed-top-xs">
            <header class=" header navbar navbar-fixed-top-xs" style="background-color:#1abc9c;"> 
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
                                <!--NOTIFICATION -->
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
                            </div>
                        </section>

                    </section>
                </aside>

                <section id="content">
                    <section class="vbox white">
                        <section class="scrollable padder">
                            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                                <li><a href="Dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active">Subjects</li>
                            </ul>
                            <div class="m-b-md">
                              
                                <h3 class="m-b-none">Subjects</h3>
                                <small>Subjects Management</small>
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
                                                    <option selected="" disabled="">Department</option>
                                                     <?php
$depsql=mysqli_query($conn,"SELECT * FROM departments");
$departmentcode="";
$selecteddep="";
if(isset($_GET["department"])){
$departmentcode="AND SubjectDepartment=".$_GET["department"];
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
                                      <div class="pull-right" style="margin-right: 15PX;">
                                 <button class="btn btn-info" onclick="printData()"><i class="fa fa-print"></i> Print</button>

                                    <button class="btn btn-blue" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> New </button>
                                </div>
                            </section>


                            <section class="panel panel-default" id="printTable">
                                <div class="row m-l-none m-r-none bg-light lter" style="background: white;border:1px grey solid;">
                                    <div class="col-sm-12 col-md-12 padder-v b-r b-light">
                                        <table class="table  m-b-none" style="font-size: 14px;background: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject Name</th>
                                                    <th>Department</th>
                                                    <th>Stage</th>
                                                    <th>Teacher Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
												$Count=0;
												$sqlget=mysqli_query($conn,"SELECT * FROM subjects,teachers,departments,stages
												 WHERE SubjectDepartment=DepartmentID AND SubjectStage=StageID AND SubjectTeacher=TeacherID" 
                                                 .$departmentcode."");
												while($row=mysqli_fetch_array($sqlget))
													{
												$Count++;
													?>
                                                <tr>
                                                    <td width="100px">
                                                        <?php echo $row["SubjectID"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["SubjectName"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["DepartmentName"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["StageName"]; ?>
                                                    </td>
                                                    <td><b><u>
                                                                <?php echo $row["TeacherName"]; ?></u></b></td>
                                                    <td width="220px">
                                          		   <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#EditModal" data-id="<?php echo $row["SubjectID"]; ?>" id="editsubject">
                                             	<i class="fa fa-edit"></i> Edit</button>

												<button class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#deletemodal" data-id="<?php echo $row["SubjectID"]; ?>" id="deletesubject"><i class="fa fa-trash-o"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <?php
												}
												?>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </section>


                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
                </section>
                <aside class="lter b-l aside-md hide" id="notes">
                    <div class="wrapper">Notification</div>
                </aside>
            </section>
        </section>
    </section>










    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="subjectinsert.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Subject Name</th>
                                <td><input type="text" class="form-control" name="subjectname"></td>
                            </tr>
                            <tr>
                                <th>Teacher Name</th>
                                <td>
                                    <select class="form-control" name="tchername">
                                        <?php 
										$tsql=mysqli_query($conn,"SELECT * FROM teachers");
										while($trow=mysqli_fetch_array($tsql))
										{
	  									?>
                                        <option value="<?php echo $trow['TeacherID'];  ?>">
                                            <?php  echo $trow['TeacherName']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Department</th>
                                <td>
                                    <div class="col-md-6">
                                        <select class="form-control" name="subdepart">
                                            <?php $depsql=mysqli_query($conn,"SELECT * FROM departments");
	 										 while($deprow=mysqli_fetch_array($depsql))
	 									 	{?>

                                            <option value="<?php echo $deprow['DepartmentID']; ?>">
                                                <?php echo $deprow["DepartmentName"]; ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th>Stage</th>
                                <td>
                                    <select class="form-control" name="subjectstage">
                                        <option>Stage</option>
                                        <?php 
										$stgsql=mysqli_query($conn,"SELECT * FROM stages");
										while($stgrow=mysqli_fetch_array($stgsql))
										{
									    ?>
                                        <option value="<?php echo $stgrow['StageID'];  ?>">
                                            <?php  echo $stgrow['StageName']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="addsubjects">Add Subject</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




<!--UPDATE FORM -->

    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="subjectinsert.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Item Information</h5>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="dynamic-content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="upadatesubject">Update Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!--DELETE STUDENT INFO -->

<!--DELETE Department INFO -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="subjectinsert.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        </button>
      </div>
      <div class="modal-body">
        <div id="dynamic-content2"></div>
        
      </div>
      <div class="modal-footer">
        <!-- PHP SCRIPT  updatestudent.php-->
        <a href="subjects.php?update=<?php echo $row2['id']; ?>"></a>
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
    $(document).on('click', '#deletesubject', function(e){
        e.preventDefault();
        var uid = $(this).data('id');
        $('#dynamic-content2').html('');
        $.ajax({
            url: 'deletesubjects.php',
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



<!-- update SCRIPT-->

    <script>
        $(document).ready(function() {
            $(document).on('click', '#editsubject', function(e) {
                e.preventDefault();
                var uid = $(this).data('id');
                $('#dynamic-content').html('');
                $.ajax({
                        url: 'editsubject.php',
                        type: 'POST',
                        data: 'id=' + uid,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        console.log(data);
                        $('#dynamic-content').html('');
                        $('#dynamic-content').html(data);
                    })
                    .fail(function() {
                        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                    });
            });
        });

    </script>


    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })

    </script>


    <script>
        function printData() {
            var divToPrint = document.getElementById("printTable");
            newWin = window.open("");
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
    <script src="js/app.plugin.js"></script>
</body>

</html>
