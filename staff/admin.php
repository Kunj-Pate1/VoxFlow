<?php 
    session_start();
    require_once '../config.php';

    $result = mysqli_query($conn,"SELECT * FROM complaints");
    $num = mysqli_num_rows($result);

    $result1 = mysqli_query($conn,"SELECT * FROM complaints where status='Resolved' ");
    $num1 = mysqli_num_rows($result1);
    
    $result2 = mysqli_query($conn,"SELECT * FROM complaints where status='Pending' ");
    $num2 = mysqli_num_rows($result2);
    
    $result3 = mysqli_query($conn,"SELECT * FROM complaints where Priority='High' ");
    $num3 = mysqli_num_rows($result3);
    
    $result4 = mysqli_query($conn,"SELECT * FROM complaints where staff='Unassigned' AND status='Pending'");
    $num4 = mysqli_num_rows($result4);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminboard</title>
    <link rel="stylesheet" href="staff.css">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <p>VoxFlow</p>
            <p1>All Complaints:<?php echo $num; ?></p1>
            <p1>Resolved Complaints:<?php echo $num1 ; ?></p1>
            <p1>Pending Complaints:<?php echo $num2; ?></p1>
            <p1>High Priority Complaints:<?php echo $num3; ?></p1>
            <p1>Unassigned Complaints:<?php echo $num4; ?></p1>
            <a href="../destroy.php" >
                <button class="logb" >
                    Logout
                </button>
            </a>
        </div>
        <div class="content">
            <div class="con-updates">
                <p>Complain Id <i class="fas fa-angle-down"></i></i></p>
                <p>Category <i class="fas fa-angle-down"></i></i></p>
                <p>Location <i class="fas fa-angle-down"></i></i></p>
                <p>Priority <i class="fas fa-angle-down"></i></i></p>
                <p>Year <i class="fas fa-angle-down"></i></i></p>
                <p>Date <i class="fas fa-angle-down"></i></i></p>
                <p>Staff <i class="fas fa-angle-down"></i></i></p>
                <p>Status <i class="fas fa-angle-down"></i></i></p>
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
                        <th colspan="2">Status</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require_once '../config.php';

                        $em = $_SESSION['name'];

                        $sql = "SELECT * FROM complaints ";
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
                                <!-- <td scope="row" class="tab"><a href="assign.php?id=<?php //echo $row['C_Id'];?>"><?php //echo $row['staff'] ?></a></td> -->
                                <td scope="row" class="tab"><?php echo $row['status'] ?></td>

                            <?php 
                                if($row['status']=="Resolved"){
                            ?>
                                    <td class="tab"><a href="resolved.php?id=<?php echo $row['C_Id'];?>"><button class='alress' >Resolved</button></a></td> 
                            <?php
                                }
                                if($row['status']!="Resolved"){
                            ?>
                                <td class="tab"><a href="resolved.php?id=<?php echo $row['C_Id'];?>"><button class='ress' >Resolve</button></a></td> 


                            </tr>
                    <?php
                                }	
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>