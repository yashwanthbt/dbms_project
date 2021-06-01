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
    $course_name =  $_POST["course_name"];
    $course_id =  $_POST["course_id"];
    $dept_name = $_POST["dept_name"];
    $dept_id =  $_POST["dept_id"]; 
    $sql1="SELECT * FROM course WHERE course_id='$course_id';";
    $data1=mysqli_query($conn,$sql1);
    $total=mysqli_num_rows($data1);
    if($total==0){
$sql = "INSERT INTO course (course_id,course_name, dept_id,dept_name) VALUES ('$course_id','$course_name','$dept_id','$dept_name');";

  if ($conn->query($sql) === TRUE) {
 
  echo ' <script> alert("New course created successfully"); </script>'; 
  echo '<a href="../html/insert_course.php"> click to insert one more course </a><br><br>';
  echo '<a href="../html/admin_insert.html"> click to here to go to home page  </a>';
  } 
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }}
  else{
    echo ' <script> alert("New course creation failed"); </script>'; 
  echo '<a href="../html/insert_course.php"> click to insert one more course </a><br><br>';
  echo '<a href="../html/admin_insert.html"> click to here to go to home page  </a>';
  }
}
$conn->close();
?>
