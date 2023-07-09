<?php
    session_start();
    if(isset($_SESSION['email'])){
        
        session_destroy();

        header("Location:index.html");
    }
    else{
        
        header("Location:dashboard.php");
    }

?>