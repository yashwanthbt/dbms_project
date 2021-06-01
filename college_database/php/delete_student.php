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
    $student_id = $_POST["student_id"];

    $sql1="SELECT * FROM student WHERE s_id='$student_id';";
    $data=mysqli_query($conn,$sql1);
    $total=mysqli_num_rows($data);
  if($total>0){
$SQL ="DELETE FROM  student  WHERE s_id='$student_id';";
    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("student deleted successfully"); </script>'; 
  echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
    else{
      echo ' <script> alert("student deletion failed"); </script>'; 
  echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
   
    }
  }
$conn->close();
?>
