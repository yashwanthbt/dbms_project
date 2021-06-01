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
}
if(isset($_POST['submit']))
{
    $student_name = $_POST["sname"];
    $student_dob = $_POST["sdob"];
    $student_mobile = $_POST["smobile"];
    $student_email = $_POST["semail"];
    $student_gender = $_POST["sgender"];
    $student_bloodgroup = $_POST["sbloodgroup"];
    $dept_id = $_POST["dept_id"];


     
$SQL = "INSERT INTO student (s_name,s_dob,s_mobile,s_email,s_gender,s_bloodgroup,dept_id) VALUES ('$student_name','$student_dob','$student_mobile','$student_email','$student_gender' ,'$student_bloodgroup','$dept_id');";

    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("New student created successfully"); </script>'; 
  echo '<a href="../html/insert_student.php"> click to insert one more student </a><br><br>';
  echo '<a href="../html/admin_insert.html"> click to here to go to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
