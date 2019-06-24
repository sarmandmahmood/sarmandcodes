<?php
		 
	require_once 'connection.php';
	
	if (isset($_REQUEST["id"])) {
			
		$id = $_REQUEST["id"];
		$sql= "SELECT * FROM Students WHERE StudentID='$id'";
		$query=mysqli_query($conn,$sql);
		while($row2 = mysqli_fetch_array($query)){
		$stddep=$row2["StudentDepartment"];
		$stdstage=$row2["StudentStage"];
		$stdshift=$row2["StudentShift"];
		$stdshift=$row2["StudentShift"];
		$stdmail=$row2["StudentEmail"];
		$stdpass=$row2["StudentPassword"];
		?>
			
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table class="table table-striped table-bordered table-hover">
	  <tr>
	  <th>Student Name</th>
	  <td><input type="text" class="form-control" value="<?php echo $row2["StudentName"]; ?>" name="stdname" required="Yes"></td>
	  </tr>
	  <tr>
	  <th>Department</th>
	  <td>

	  <div class="col-md-6">
	  <select class="form-control" name="stddep">
	  <?php
	  $depsql=mysqli_query($conn,"SELECT * FROM departments");
	  while($drow=mysqli_fetch_array($depsql)){
	  ?>
	  <option value="<?php echo $dval=$drow["DepartmentID"]; ?>" <?php if($dval==$stddep){echo "selected";} ?>><?php echo $drow["DepartmentName"]; ?></option>
	  <?php
	  }
	  ?>
	  </select>
	  </div>
	  </td>
	  </tr>
	
	  <tr>
	  <th>Stage/Shift</th>
	  <td>
	  <div class="col-md-6">
	  <select class="form-control" name="stdstage">
	  <?php
	  $stagesql=mysqli_query($conn,"SELECT * FROM stages");
	  while($srow=mysqli_fetch_array($stagesql)){
	  ?>
	  <option value="<?php echo $sval=$srow["StageID"]; ?>" <?php if($sval==$stdstage){echo "selected";} ?>><?php echo $srow["StageName"]; ?></option>
	  <?php
	  }
	  ?>
	  </select>
	  </div>
	  <div class="col-md-6">
	  <select class="form-control" name="stdshift">
	  <?php
	  $shsql=mysqli_query($conn,"SELECT * FROM shifts");
	  while($shrow=mysqli_fetch_array($shsql)){
	  ?>
	  <option value="<?php echo $shval=$shrow["ShiftID"]; ?>" <?php if($shval==$stdshift){echo "selected";} ?>><?php echo $shrow["ShiftName"]; ?></option>
	  <?php
	  }
	  ?>
	  </select>
	  </div>
	  </td>
	  </tr>
	  <tr>
	  <th>E-Mail Address</th>
	  <td><input type="text" class="form-control" value="<?php echo $row2["StudentEmail"]; ?>" name="stdmail" required="Yes"></td>
	  </tr>
	  <tr>
	  <th>Phone Number</th>
	  <td><input type="text" class="form-control" value="<?php echo $row2["StudentPhone"]; ?>" name="stdnumber" required="Yes"></td>
	  </tr>

	   <tr>
	  <th>Password</th>
	  <td>	<input   type="Password" class="form-control" onclick="Toggle()" id="stdpassword" value="<?php echo $row2["StudentPassword"]; ?>" name="stdpass" required="Yes"></td>
	  </tr>

	  
	  </table>
		
	  Note: To show password click on it.
    <script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp = document.getElementById("stdpassword"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 	
			
		<?php				
	}
	}
	?>