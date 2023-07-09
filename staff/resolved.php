<?php 
    require_once '../config.php';

	if($conn){
	?>
		<script>
			alert('COMPLAINT RESOLVED successfully !!!');
		</script>
	<?php
	}
	else{
		die("No Connection".mysqli_connect_error());
	}
	
	$id= $_GET['id'];
	
	$resolvequery = mysqli_query($conn, "UPDATE complaints SET status = 'Resolved' WHERE `complaints`.`C_Id` = $id");
	// $daquery = mysqli_query($conn, "UPDATE complaints SET Date of resolution = current_timestamp() WHERE `complaints`.`C_Id` = $id");
	
	header('location:admin.php');
?>