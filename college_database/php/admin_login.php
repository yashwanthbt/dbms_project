<?php
session_start();
$servername = "localhost"; /* Host name */
$username = "root"; /* User */
$password = ""; /* Password */
$dbname = "college"; /* Database name */

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    $ID=$_POST["adminid"];
    $psw=$_POST["psw"];
    $SQL = "SELECT admin_id FROM admin where `admin_id`='$ID' and `admin_password`='$psw';";
    $result    = $conn->query($SQL);
    $user_data = $result->fetch_assoc();
    $count_row = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_main.css">
    <title>Admin Login</title>
</head>
<body>
    <?PHP
    if($count_row>0){ 
echo '
<div>
<header>College database</header>
</div>
<nav class="navigation">
    <a class="active" href="#"> <li>Insert</li></a>
    <a href="../html/admin_update.html"> <li>Update</li> </a>
    <a href="../html/admin_delete.html"> <li>Delete</li> </a>
    <a href="../html/main_page.html"> <li>Logout</li></a>
</nav>

<section>
<a href="../html/insert_student.php">
<div class="section">
   Insert student details
</div>
</a> 
<a href="../html/insert_teacher.php">
<div class="section">
    Insert teacher details
</div>
</a>
<a href="../html/insert_course.php">
<div class="section">
    Insert course details
</div>
<a href="../html/insert_dept.html">
    <div class="section">
      Insert department details
    </div>';}
else{
    echo '<div >INVALID CREDENTIALS
    <a href=../php/admin_login.php class="invalid">click here to go to login page</a></div>';
}

?>

