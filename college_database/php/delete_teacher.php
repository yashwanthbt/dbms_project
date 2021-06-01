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
    $teacher_id = $_POST["teacher_id"];

      $sql1="SELECT * from teacher where t_id='$teacher_id';";
      $data=mysqli_query($conn,$sql1);
      $total=mysqli_num_rows($data);
      if($total>0){
$SQL ="DELETE FROM  teacher  WHERE t_id='$teacher_id';";
    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("Staff deleted successfully"); </script>'; 
  echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }}
    else{
      echo ' <script> alert("Staff deletion FAILED"); </script>'; 
      echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
      echo '<br><br><a href="../html/admin_insert.html"> click to here to go back to home page  </a>';
      
      
    }
}
$conn->close();
?>
