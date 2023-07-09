<?php
    session_start();
    require_once '../config.php';
    $trimmedMail = str_replace(".com", "", $_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cstyle.css" />
    <title>Resolved Complaints</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <p><a href="../dashboard.php" class="hlink">VoxFlow</a></p>
            <p1>Resolved Complaints</p1>
            <a href="../destroy.php" ><button class="logb" >Logout</button></a>
        </div>
        <table class="com-table">
	        <thead>
		        <tr>
                    <th>Complaint ID</th>
                    <th>Mobile No.</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Priority</th>
                    <th>Description</th>
                    <th>Time of Registration</th>
                    <th >Staff</th>
                    <th>Status</th>
		        </tr>
	        </thead>
	        <tbody>
                <?php

                    $sql = "SELECT * FROM complaints where email= '$trimmedMail' AND status='Resolved'";
                    $result = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);

                    while($row = mysqli_fetch_array($result)){
                ?>
                        <tr>
                            
                            <td scope="row" class="id"><?php echo $row['C_Id'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Mob'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Category'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Location'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Priority'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Description'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['Reg_time'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['staff'] ?></td>
                            <td scope="row" class="tab"><?php echo $row['status'] ?></td>
                            <!-- <td class="tab"><a href="resolved.php?id=<?php //echo $row['C_Id'];?>"><button class='ress' >Resolve</button></a></td> This one is for admins -->
                        </tr>
                <?php	
                    }
                ?>
            </tbody>
	    </table>
    </div>
</body>
</html>