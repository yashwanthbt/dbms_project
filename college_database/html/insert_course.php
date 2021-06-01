<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/admin_main.css">
    </head>
    <body>
        <div>
            <header>College database</header>
        </div>
        <nav class="navigation">
                <a class="active" href="../html/admin_insert.html"> <li>Insert</li></a>
                <a href="../html/admin_update.html"> <li>Update</li> </a>
                <a href="../html/admin_delete.html"> <li>Delete</li> </a>
                <a href="../html/main_page.html"> <li>Logout</li></a>
        </nav>


        <p>Enter the course details</p>
<div class="container">
   
    <form action="../php/insert_course.php" method="POST" target="_self">
        <label for="course_name"><b>Course Name:</b></label>
        <input type="text" name="course_name" placeholder="Enter course name" required>
        <br>
        <br>
        <br>
     
        <label for="course_id"><b>Course Id:</b></label>
        <input type="text" name="course_id" placeholder="Enter course ID" required>
        <br>
        <br>
        <br>
        <label for="dept_id"><b>Department Id:</b></label>
        <select name="dept_id" >
        <?php
        $result = mysqli_query($conn,"SELECT dept_id from dept");
    while($row=mysqli_fetch_array($result)){
      echo "<option value='".$row['dept_id']."'>" . $row['dept_id'] . "</option>";

    } ?>
        </select>
        <br>
        <br>
        <br>
        <label for="dept_name"><b>Department Name:</b></label>
        <select name="dept_name" >
        <?php
        $result = mysqli_query($conn,"SELECT dept_name from dept");
    while($row=mysqli_fetch_array($result)){
      echo "<option value='".$row['dept_name']."'>" . $row['dept_name'] . "</option>";

    } ?>
        </select>
        <br>
        <br>
        <br>
   
          <input type="submit" value="Submit" name="submit">
       
   
</div>
<footer class="footer">
    <h4><em>copyright@2021</em></h4>
    <h3> Done by:Yashwanth,Rameez,Praveen</h3>
</footer>
</body>
</html>
