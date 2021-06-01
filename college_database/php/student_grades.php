<?php

    session_start();
    $id=$_SESSION["iid"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
   //  ECHO $id;
    }
    
    
    $SQL="SELECT * FROM marks WHERE s_id='$id';";
   // echo $SQL;
    $data=mysqli_query($conn,$SQL);
    $total=mysqli_num_rows($data);
   // echo $total;
  // $row = mysqli_fetch_array($data)
    $sqlgr="SELECT grade FROM grades WHERE s_id='$id';";
    //echo $sqlgr;
    $data1=mysqli_query($conn,$sqlgr);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/student_home.css">
    <title>STUDENT GRADES PAGE</title>
</head>
<body>
    <header><H1>COLLEGE OF ENGINEERING</H1></header>
    <nav class="id">
    <A class="btn " href="../php/students_home1.php">HOME</A>
        <A class="btn " href="../php/student_attendance.php">ATTENDANCE</A>
        <A class="btn active" href="../php/student_grades.php">GRADES</A>
        <A class="btn " href="../php/student_teacherdetails.php">FACULTY DETAILS</A>
        <A class="btn " href="../html/main_page.html">LOG OUT</A>
    </nav>
    <section class="table">
    <?php
    echo "<table border='1'>
    <br>
    <br><br>

<tr>

<th>Course Id</th>

<th>Total Marks</th>

<th>Marks Scored</th>

<th>Grade</th>

</tr>";

 

while($row = mysqli_fetch_array($data) AND $result = mysqli_fetch_array($data1))

  {

  echo "<tr>";

  echo "<td >" . $row['course_id'] . "</td>";

  echo "<td>" . $row['total_marks'] . "</td>";

  echo "<td>" . $row['marks_scored'] . "</td>";

  echo "<td>" . $result['grade'] . "</td>";

  echo "</tr>";

  }

echo "</table>";
mysqli_close($conn);
?>

    </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>
        </body>


</html>
