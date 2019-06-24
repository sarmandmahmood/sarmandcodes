<?php
		 
	require_once 'connection.php';
	
	if (isset($_REQUEST["id"])) {
			
		$id = $_REQUEST["id"];
		$sql= "SELECT * FROM subjects WHERE SubjectID='$id'";
		$query=mysqli_query($conn,$sql);
		while($row2 = mysqli_fetch_array($query)){
			$stdname=$row2["SubjectName"];
		?>
			
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<p>Are You Sure You Want To Delete <?php echo "$stdname"; ?></p>		
			
		<?php				
	}
	}
	?>