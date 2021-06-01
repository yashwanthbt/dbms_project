<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
        //ECHO "OK";
    }
    $ID=$_POST["studentid"];
    $iid=(int)$ID;
    //echo $iid;
    $cname=$_POST["cname"];
    //echo $cname;
    $totalmarks=$_POST["totalmarks"];
    //echo $totalmarks;
    $marksscored=$_POST["marksscored"];
    $sql1="SELECT course_id FROM course WHERE course_name='$cname';";
    $data=mysqli_query($conn,$sql1);
    $result=mysqli_fetch_assoc($data);
    //echo $sql1;
  $c_id= $result['course_id'];
 // echo $c_id;
  // $total=mysqli_num_rows($data);
   //echo $total;
   $CHECKSQL="SELECT * FROM marks WHERE s_id='$iid' AND course_id='$c_id';";
   $chckdata=mysqli_query($conn,$CHECKSQL);
   $ctotal=mysqli_num_rows($chckdata);
    //echo $ctotal;
    if($ctotal== 0){
    $SQL="INSERT INTO `marks` ( `s_id`, `course_id`, `total_marks`, `marks_scored`) VALUES ( '$iid', '$c_id', '$totalmarks', '$marksscored');";
    //echo $SQL;
   if($conn->query($SQL)== true){
       $insert = true;
     //  echo "success";
   }}
   else{
       $t = 1;
   }
 //  else {
   //    echo "ERROR: $SQL <br> $conn->error";
   //}
    //$total=mysqli_num_rows($data);
   // echo $total;
   // $result=mysqli_fetch_assoc($data);
   // $DEPT=',$result['dept_id'],';
   //$dept= $result['dept_id'];
   //echo $dept;
    //$sql1="SELECT dept_name from dept where dept_id='$dept';";
    //$DATA1=mysqli_query($conn,$sql1);
    //$result1=mysqli_fetch_assoc($DATA1);
 //  echo $result1['dept_name'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/OTHERS.CSS">
    <title>INSERT MARKS</title>
</head>
<body>
    <header><H1>COLLEGE OF ENGINEERING<br>INSERT MARKS</H1></header>
    <nav class="id">
    <A class="btn " href="../php/teacher_home1.php">HOME</A>
    <A class="btn active " href="../html/insert_marks_attendance.html">INSERT</A>
    <A class="btn " href="../html/update_marks_attendance.html">UPDATE</A>
    <A class="btn " href="../php/payslip.php">PAYSLIP</A>
    <A class="btn " href="../html/main_page.html">LOG OUT</A>
        
    </nav>
    <section >
        <?php
        error_reporting(0);
        if($insert == true)
        ECHO '<script> alert("INSERTION SUCCESSFUL"); </script>';
        elseif($t ==1) {
            ECHO '<script> alert("INSERTION FAILED BECAUSE ALREADY DATA EXIST"); </script>';
        }
        else{
            ECHO "INSERTION FAILED TRY AGAIN";
        }
        ?>
        <DIV class="sec">
        <form class="atr" method="POST" action="insert_marks.php">
        <label>STUDENT ID:</label>
            <input type="text" id="stud" name="studentid" placeholder="enter student id "required><br><br><br>
        
            <label>COURSE NAME:</label>
                <input type="char" id="stud" name="cname" placeholder="enter course name" required><br><br><br>

                <label>TOTAL MARKS:</label>
                    <input type="text" id="stud" name="totalmarks" placeholder="enter total marks " required><br><br><br>
        
            <label>MARKS SCORED:</label>
                <input type="text" id="GRADE" name="marksscored" placeholder="enter marks scored " required><br><br><br>
            <input type="submit" value="SUBMIT">
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>
        </body>

     

</html>