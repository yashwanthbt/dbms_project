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
$teacher_id = $_POST["tid"];
$teacher_name = $_POST["tname"];
$teacher_dob = $_POST["tdob"];
$teacher_mobile = $_POST["tmobile"];
$teacher_email = $_POST["temail"];
$teacher_gender = $_POST["tgender"];
$teacher_bloodgroup = $_POST["tbloodgroup"];
$dept_id = $_POST["dept_id"];
$course_id = $_POST["course_id"];
$designation = $_POST["tdesignation"];

$sql1="SELECT * FROM teacher WHERE t_id='$teacher_id';";
$data=mysqli_query($conn,$sql1);
$total=mysqli_num_rows($data);
if($total==0){
$SQL = "INSERT INTO teacher(t_id,t_name,t_dob,t_mobile,t_email,t_bloodgroup,t_gender,dept_id,course_id,designation)
VALUES ('$teacher_id','$teacher_name','$teacher_dob','$teacher_mobile','$teacher_email','$teacher_bloodgroup','$teacher_gender','$dept_id','$course_id','$designation');";


if ($conn->query($SQL) === TRUE) {
echo ' <script> alert("New teacher data created successfully"); </script>'; 
echo '<a href="../html/insert_teacher.php"> click to insert one more teacher </a><br><br>';
echo '<a href="../html/admin_insert.html"> click to here to go to home page </a>';
} 
else {
echo "Error: " . $SQL . "<br>" . $conn->error;
}}
else{
    echo ' <script> alert("New teacher data creation FAILED"); </script>'; 
echo '<a href="../html/insert_teacher.php"> click to insert one more teacher </a><br><br>';
echo '<a href="../html/admin_insert.html"> click to here to go to home page </a>';
}
}
$conn->close();
?>

