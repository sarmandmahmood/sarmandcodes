
<?php
session_start();
if(isset($_SESSION["login_account"]))
{
}
else
{
  header("location:accountcheck.php");
}
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>ASAS | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/font.css" type="text/css" />
<link rel="stylesheet" href="css/sb-admin-2.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />

<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
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
<section class="hbox stretch ">
<!--NAVIGATION BAR -->
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
<!--END NAVIGATIONBAR -->
<section id="content ">
  <!--Dashboard-->
<section class="vbox white">
<section class="scrollable padder">
<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
<li><a href="Dashboard.php"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Dashboard</li>
</ul>
<div class="m-b-md">
<h3 class="m-b-none">Dashboard</h3>
<small>Welcome back, <?php echo $_SESSION["login_account"]; ?></small>
</div>
<section >
  

<!--Dashboard start here -->
  <!-- Num of Students -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel  panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa   fa-user  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                                    <?php
                                                    $countstudents=0;
                                                    //SHOW QUERY
                                                    $sqlget=mysqli_query($conn,"SELECT * FROM students");
                                                    while($row=mysqli_fetch_array($sqlget))
                                                      {
                                                     $countstudents++;
                                                     ?>
                                                     <?php
                                                     }
                                                      ?>
                                        <p Text="text" runat="server" ID="studentCounter" ><?php echo $countstudents; ?></p></div>
                                    <div>Total of Students</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left" ><a href="students.php">Students</a></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

                       <!-- Num of Teacher -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel  panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa   fa-user  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> 
                                         <?php
                                                    $countteacher=0;
                                                    //SHOW QUERY
                                                    $sqlget=mysqli_query($conn,"SELECT * FROM teachers");
                                                    while($row=mysqli_fetch_array($sqlget))
                                                      {
                                                     $countteacher++;
                                                     ?>
                                                     <?php
                                                     }
                                                      ?>
                                        <p  runat="server" ID="teachersCounter" ><?php echo $countteacher; ?></p></div>
                                    <div>Total of Teachers</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer" >
                                <span class="pull-left"><a href="teachers.php">Teachers</a></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

                 <!-- Num of Admin -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel  panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa   fa-user  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                         <?php
                                                    $countusers=0;
                                                    //SHOW QUERY
                                                    $sqlget=mysqli_query($conn,"SELECT * FROM users");
                                                    while($row=mysqli_fetch_array($sqlget))
                                                      {
                                                     $countusers++;
                                                     ?>
                                                     <?php
                                                     }
                                                      ?>
                                         <p  runat="server" ID="AdminCounter" ><?php echo $countusers ?></p>
                                    </div>
                                    <div>Total of Admins</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer" >
                                <span class="pull-left"><a href="users.php">Admin</a></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

                  <!-- Num of Users -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel  panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa   fa-users  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                         <?php
                                                    $scount=0;
                                                    $tcount=0;
                                                    $acount=0;
                                                    //SHOW QUERY
                                                      $ssql=mysqli_query($conn,"SELECT  * FROM users");
                                                       while($srow=mysqli_fetch_array($ssql))
                                                      {
                                                       $acount++;
                                                    
                                                       }


                                                        $tsql=mysqli_query($conn,"SELECT  * FROM teachers");
                                                        while($trow=mysqli_fetch_array($tsql))
                                                      {
                                                      $tcount++;
                                                    
                                                       }

                                                          $asql=mysqli_query($conn,"SELECT  * FROM students");
                                                          while($arow=mysqli_fetch_array($asql))
                                                      {
                                                     $scount++;
                                                    
                                                       }

                                                       $totaluser=$acount+$tcount+$scount;


                                                     
                                                      ?>
                                        <p  runat="server" ID="usersCounter" ><?php echo ($totaluser); ?></p>
                                    </div>
                                    <div>Total of Users</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer" >
                                <span class="pull-left">Users</span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

<!--Dashboard End here -->
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