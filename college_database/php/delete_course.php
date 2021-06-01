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
    $course_name = $_POST["course_name"];

      $sql1="SELECT * from course where course_name='$course_name';";
      $data=mysqli_query($conn,$sql1);
      $total=mysqli_num_rows($data);
      if($total>0){
$SQL ="DELETE FROM course WHERE course_name ='$course_name';";
    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("Course deleted successfully"); </script>'; 
  echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }}
    else{
      echo ' <script> alert("Course deletion FAILED"); </script>'; 
      echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
      echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
      
    }
}
$conn->close();
?>
