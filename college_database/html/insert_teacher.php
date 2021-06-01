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


        <p>Enter the teacher details</p>
<div class="container">
   
    <form action="../php/insert_teacher.php" method="POST" target="_self">
        <label for="tid"><b>ID:</b></label> 
        <input type="text" name="tid" placeholder="Enter teacher id" required>
        <br>
        <br>
        <label for="tname"><b>Name:</b></label> 
        <input type="text" name="tname" placeholder="Enter name" required>
        <br>
        <br>
        <label for="tdob"><b>DOB:</b></label> 
        <input type="date" name="tdob" required>
        <br>
        <br>
        <label for="tgender"><b>Gender:</b></label>
        <select name="tgender" id="gender" >
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <br>
          <br>
        <label for="temail"><b>Email ID:</b></label> 
        <input type="email" name="temail" placeholder="Enter email id" required>
        <br>
        <br>
        <label for="tmobile"><b>Mobile Number:</b></label> 
        <input type="text" name="tmobile" placeholder="Enter mobile number" required>
        <br>
        <br>
        <label for="tbloodgroup"><b>Blood Group:</b></label> 
        <input type="text" name="tbloodgroup" placeholder="Enter blood group" required>
        <br>
        <br>
           
        <label for="tdesignation"><b>Desgination:</b></label>
        <select name="tdesignation" id="tdesignation">
            <option value="hod">HOD</option>
            <option value="lecturer">lecturer</option>
          </select>
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
          <label for="course_id"><b>Course ID:</b></label> 
          <select name="course_id" >
        <?php
       
        $result = mysqli_query($conn,"SELECT * from course where dept_id in (select dept_id from dept)");
        
    while($row=mysqli_fetch_array($result)){
      echo "<option value='".$row['course_id']."'>" . $row['course_id'] . "</option>";

    } ?>
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
