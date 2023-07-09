<?php 
  session_start();
  require_once '../config.php';

  $em = $_SESSION['email'];

  if(isset($_SESSION['email']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $mob = $_POST['mobile'];
    $category = $_POST['category'];
    $loc = $_POST['location'];
    $priority = $_POST['priority'];
    $desc = $_POST['description'];
    $em = $_SESSION['email'];

    $query = mysqli_query($conn,"INSERT into complaints (email, Mob, Category, Location, Priority, Description, Reg_time) VALUES ('$em','$mob','$category','$loc','$priority','$desc',current_timestamp()) ");

    header("Location:pcom.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint form</title>
    <link rel="stylesheet" href="cstyle.css" />
</head>
<body>
  <div class="container">
    
      <div class="nav">
      <p><a href="../dashboard.php" class="hlink">VoxFlow</a></p>
          <a href="../destroy.php" ><button class="logb" >Logout</button></a>
      </div>

      <form action="cform.php" method="post" enctype="multipart/form-data">

        <div>
          <label for="mobile">Mobile Number: (*optional)</label>
          <input type="tel" id="mobile" name="mobile" >
        </div>
        <div>
          <label for="category">Category:</label>
          <select id="category" name="category" required>
            <option value="">Select Category</option>
            <option value="Academic-Issues">Academic Issues</option>
            <option value="Administrative-Issues">Administrative Issues</option>
            <option value="Faculty-related-Issues">Faculty-related Issues</option>
            <option value="Facilities & Infrastructure">Facilities & Infrastructure</option>
            <option value="Discrimination & Harassment">Discrimination & Harassment</option>
            <option value="Financial Matters">Financial Matters</option>
            <option value="Admission and Recruitment">Admission and Recruitment</option>
            <option value="Safety & Security">Safety & Security</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div>
          <label for="location">Location: (*optional)</label>
          <input type="text" id="location" name="location" >
        </div>
        <div>
          <label for="priority">Priority Level:</label>
          <select id="priority" name="priority" required>
            <option value="">Select Priority</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
          </select>
        </div>
        <div>
          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div>
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>

</body>
</html>