<?php
session_start();
include("connection.php"); 
if(isset($_SESSION["login_account"]))
{
	header("location:index.php");
}





?>
<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="utf-8" />
      <title>Lebanese French University | Login</title>
      <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="css/font.css" type="text/css" />
      <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
   </head>
   <body class="">
   <style type="text/css">
   html{background-color: white;}
        .box-shadow{
        -webkit-box-shadow: -2px 4px 37px 0px rgba(189,195,199,1);
      -moz-box-shadow: -2px 4px 37px 0px rgba(189,195,199,1);
      box-shadow: -2px 4px 37px 0px rgba(189,195,199,1);
        }

        .btn-blue{background-color:#3498db;color: white;}

        .btn-red{background-color:#95a5a6;color: white;}
        .btn-blue:hover{
          color: white;
          background-color: #2980b9;
        }
          .btn-red:hover{
            color:white;
          background-color: #7f8c8d;
        }
        </style>



      <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
         <div class="container aside-xxl">
           <a class="navbar-brand block" href="" style="font-size:16px; line-height:20px;">Attendance Management System - Admin Login</a>

			<?php
			if(isset($_POST["Sign"])){
			$userent=$_POST["username"];
			$passent=$_POST["adminpass"];
			$sql="SELECT * FROM users WHERE UserEmail='$userent' AND UserPassword='$passent'";
			$check=mysqli_query($conn,$sql);
			$count=0;
			while($rows=mysqli_fetch_array($check))
			{
				$count=1;
				$usid=$rows["UserName"];
			}
			if($count==1)
			{
				$_SESSION["login_account"]=$usid;
				header("location:Dashboard.php");
			}
			else
			{
			?>
				<div class="alert alert-danger fade in alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<strong>Ops!</strong> Wrong Password Please Retry with Correct Password.
				</div>
			<?php
			}
			}
			?>
				<br><br><br>
     
            <section class="panel panel-default  m-t-lg box-shadow" >
               <header class="panel-heading text-center " style="background: #2ecc71;color: white;"> 
               	<strong>Adminstrator Login</strong> 
               </header>
               <form action="" method="POST" class="panel-body wrapper-lg">
                  <div class="form-group"> 

				  <input type="text" placeholder="Email" class="form-control input-lg " name="username"> 
				  <br>
                  <div class="form-group"> 
                  	 <input type="password" id="inputPassword" placeholder="Password" class="form-control input-lg " name="adminpass">
                  	</div>

              
                
                  	&nbsp;&nbsp;
                      <div class="">
                      <a href="">
                         <button type="submit" name="Sign" class="btn btn-blue   ">Sign in</button> 
                     </a>

                     
                        <button type="submit" name="cancel" class="btn btn-red">Back</button> 
                   
                      </div>
                       
                     
                     <?php  
                      if (isset($_POST["cancel"])) {
                        header("location:index.php");
                      }
                  ?>

                   
                  
                  
               </form>
            </section>
         </div>
      </section>
      <!-- footer --> 
     
      <!-- / footer --> <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/app.plugin.js"></script>
   </body>
</html>