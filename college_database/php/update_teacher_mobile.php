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
    $updated_teacher_mobile = $_POST["updated_teacher_mobile"];
    $SQL1="SELECT * FROM teacher WHERE t_id='$teacher_id';";
    $DATA=mysqli_query($conn,$SQL1);
    $total=mysqli_num_rows($DATA);
    if($total>0){
$SQL =" UPDATE teacher SET t_mobile = '$updated_teacher_mobile'  WHERE t_id='$teacher_id';";
    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("updated teacher mobile number successfully"); </script>'; 
  echo '<a href="../html/update_teacher.html"> click to here to go to update_page  </a>';
  echo '<br><br><a href="../html/admin_insert.html"> click to here to go to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }}
    else{
      echo ' <script> alert("Updation of teacher mobile number has FAILED"); </script>'; 
      echo '<a href="../html/update_teacher.html"> click to here to go to update_page  </a>';
      echo '<br><br><a href="../html/admin_insert.html"> click to here to go to home page  </a>';
    }
}
$conn->close();
?>
