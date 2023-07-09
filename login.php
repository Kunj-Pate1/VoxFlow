<?php

    require_once 'config.php';

    session_start();

    if(isset($_SESSION['email'])){
        header ('location:dashboard.php');
    }
    elseif(isset($_POST['Semail'])){
        $sem = $_POST['Semail'];
        $spass = $_POST['Spassword'];

        $sql = mysqli_query($conn,"INSERT INTO users (email, upassword, joining_date) VALUES ('$sem', '$spass',current_timestamp())");

        session_start();
        $_SESSION['email']=$sem;

        header ('location:dashboard.php');
    }
    elseif(isset($_POST['Lemail'] )){
        $lem = $_POST['Lemail'];
        $lpass = $_POST['Lpassword'];

        $scode = $_POST['Scode'];

        $query = "SELECT email, upassword FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $lem);
        $stmt->execute();
        $stmt->bind_result($dbemail, $dbpassword);
        $stmt->fetch();
        $stmt->close();

        if($dbemail == $lem && $dbpassword == $lpass && $scode == null){
            session_start();
            $_SESSION['email']=$lem;

            header ('location:dashboard.php');
        }

        elseif($scode == '5t@11'){
            $query1 = "SELECT Email, Password FROM staff WHERE Email = ?";
            $stmt = $conn->prepare($query1);
            $stmt->bind_param("s", $lem);
            $stmt->execute();
            $stmt->bind_result($dbemail1, $dbpassword1);
            $stmt->fetch();
            $stmt->close();

            if($dbemail1 == $lem && $dbpassword1 == $lpass){

                $query2 = "SELECT Name FROM staff WHERE Email = ?";
                $stmt = $conn->prepare($query2);
                $stmt->bind_param("s", $dbemail1);
                $stmt->execute();
                $stmt->bind_result($dbname);
                $stmt->fetch();
                $stmt->close();

                session_start();
                $_SESSION['email']=$lem;
                $_SESSION['name']=$dbname;
                header ('location:./staff/staff.php');
            }
            
        }
        
        else{
            if($dbemail == null){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Unsuccessful</title>
            </head>
            <body>
                <a href="index.html">Return</a>
                <script>alert("Theres no account with this Email. Sign-in");</script>
            </body>
            </html>
            <?php }
                else{ ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Unsuccessful</title>
            </head>
            <body>
                <a href="index.html">Return</a>
                <script>alert("Incorrect Username or Password");</script>
            </body>
            </html>

        <?php
        } 
    }
    }

?>