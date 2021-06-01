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
    $dept_name = $_POST["dept_name"];

    $SQL1="SELECT * from dept WHERE dept_name='$dept_name';";
    $data=mysqli_query($conn,$SQL1);
    $total=mysqli_num_rows($data);
    if($total>0){

    $SQL ="DELETE FROM dept WHERE dept_name='$dept_name';";
 

    if ($conn->query($SQL) === TRUE) {
  echo ' <script> alert("Department deleted successfully"); </script>'; 
  echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
  echo '<br><br><a href="../html/main_page.html"> click to here to go back to home page  </a>';
    } 
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }}
    else{
      echo ' <script> alert("Department deletion FAILED"); </script>'; 
      echo '<a href="../html/admin_delete.html"> click to here to go back to delete page  </a>';
      echo '<br><br><a href="../html/main_page.html"> click to here to go back to home page  </a>';
      
    }
}
$conn->close();
?>
