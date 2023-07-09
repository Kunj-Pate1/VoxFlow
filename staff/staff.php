<?php 
    session_start();
    require_once '../config.php';

    $em = $_SESSION['name'];

    $result = mysqli_query($conn,"SELECT * FROM complaints where staff= '$em' ");
    $num = mysqli_num_rows($result);

    $result1 = mysqli_query($conn,"SELECT * FROM complaints where staff= '$em' AND status='Resolved' ");
    $num1 = mysqli_num_rows($result1);
    
    $result2 = mysqli_query($conn,"SELECT * FROM complaints where staff= '$em' AND status='Pending' ");
    $num2 = mysqli_num_rows($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="staff.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <p>VoxFlow</p>
            <a href="../destroy.php" >
                <button class="logb" >
                    Logout
                </button>
            </a>
        </div>
        <div class="wtext">
            <p>Welcome, <?php echo $_SESSION['name']; ?></p>
        </div>
        
        <div class="dash-main">
            <div class="dash-img">
                <img src="../img/form.jpg" alt="img" >
            </div>
            <div class="dash-all">
                <p><a href="stotal.php">Total Complaints: <?php echo $num;?></a></p>
                <p><a href="sreso.php">Resolved Complaints: <?php echo $num1;?></a></p>
                <p><a href="spending.php">Pending Complaints: <?php echo $num2;?></a></p>
                <p class="master"><a href="#" onClick=mastercode()> Admin Access </a></p>
            </div>
        </div>
    </div>
    <script>
        function mastercode() {
            var userInput = prompt("Enter the Master Code:");
            if (userInput == "5261") {
                window.location.href = "admin.php";
            }
            else {
                alert("Dont try to overstep your boundaries🤡");
            }
        }
    </script>
</body>
</html>