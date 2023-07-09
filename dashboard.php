<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashb.css" />
</head>
<body>
    <div class="container">
        <div class="nav">
            <p>VoxFlow</p>
            <a href="destroy.php" >
                <button class="logb" >
                    Logout
                </button>
            </a>
        </div>
        <div class="main">
            <div class="wtext">
                <p>Welcome, what can we do for you?</p>
            </div>
            
            <div class="uactions">
                <div class="item">
                    <a href="./complaints/cform.php"><button class="actionb">Initialize Complaint</button></a>
                    <a href="./complaints/pcom.php"><button class="actionb">Previous Complaints</button></a>
                    <a href="./complaints/rcom.php"><button class="actionb">Resolved Complaints</button></a>
                    <a href="./complaints/pencom.php"><button class="actionb">Pending Complaints</button></a>
                </div>
                <img src="./img/complain.jpg" alt="">
            </div>
        </div>
    </div>


</body>
</html>