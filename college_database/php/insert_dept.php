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
    $dept_name =  $_POST["dept_name"];
    $dept_id =  $_POST["dept_id"];
    $SQL1="SELECT * FROM dept WHERE dept_id='$dept_id';";
    $data=mysqli_query($conn,$SQL1);
    $total=mysqli_num_rows($data);
    if($total==0){
$sql = "INSERT INTO dept (dept_name, dept_id) VALUES ('$dept_name', '$dept_id');";

if ($conn->query($sql) === TRUE) {
 
  echo ' <script> alert("New department created successfully"); </script>'; 
  echo '<a href="../html/insert_dept.html"> click to insert one more department </a><br><br>';
  echo '<a href="../html/admin_insert.html"> click to here to go to home page  </a>';
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}}
else{
  echo ' <script> alert("New department creation FAILED"); </script>'; 
  echo '<a href="../html/insert_dept.html"> click to insert one more department </a><br><br>';
  echo '<a href="../html/admin_insert.html"> click to here to go to home page  </a>';
}
}
$conn->close();
?>
