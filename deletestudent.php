<?php
		 
	require_once 'connection.php';
	
	if (isset($_REQUEST["id"])) {
			
		$id = $_REQUEST["id"];
		$sql= "SELECT * FROM students WHERE StudentID='$id'";
		$query=mysqli_query($conn,$sql);
		while($row2 = mysqli_fetch_array($query)){
			$stdname=$row2["StudentName"];
		?>
			
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<p>Are You Sure You Want To Delete <?php echo "$stdname"; ?></p>		
			
		<?php				
	}
	}
	?>