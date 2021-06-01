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
    $updated_student_email = $_POST["updated_student_email"];

$SQL1="SELECT * FROM student WHERE s_id='$student_id';";
$DATA=mysqli_query($conn,$SQL1);
$total=mysqli_num_rows($DATA);
if($total>0){
$SQL =" UPDATE student SET s_email = '$updated_student_email'  WHERE s_id='$student_id';";

    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("updated student email ID successfully"); </script>'; 
  echo '<a href="../html/update_student.html"> click to here to go to update_page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }}
    else{
      echo ' <script> alert("Updation of student email ID FAILED BECAUSE DATA DOESNT EXIST"); </script>'; 
  echo '<a href="../html/update_student.html"> click to here to go to update_page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go to home page  </a>';
    }
}
$conn->close();
?>
