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


        <p>Enter the student details</p>
<div class="container">
   
    <form action="../php/insert_student.php" method="POST" target="_self" >
        <label for="sname"><b>Name:</b></label> 
        <input type="text" name="sname" placeholder="Enter name" required>
        <br>
        <br>
        <label for="sdob"><b>DOB:</b></label> 
        <input type="date" name="sdob" required>
        <br>
        <br>
        <label for="sgender"><b>Gender:</b></label>
        <select name="sgender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        <br>
        <br>
        <label for="semail"><b>Email ID:</b></label> 
        <input type="email" name="semail" placeholder="Enter email id" required>
        <br>
        <br>
        <label for="smobile"><b>Mobile Number:</b></label> 
        <input type="text" name="smobile" placeholder="Enter mobile number" required>
        <br>
        <br>
        <label for="sbloodgroup"><b>Blood Group:</b></label> 
        <input type="text" name="sbloodgroup" placeholder="Enter blood group" required>
        <br>
        <br>
        <label for="dept_id"><b>Department:</b></label>
        <select name='dept_id'>
        <?php
        $result = mysqli_query($conn,"SELECT dept_id from dept");
    while($row=mysqli_fetch_array($result)){
      echo "<option value='".$row['dept_id']."'>" . $row['dept_id'] . "</option>";

    } ?>
        </select>
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
