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
   $SQLR="SELECT * FROM marks WHERE s_id= '$iid' AND course_id='$c_id';"; 
   $data=mysqli_query($conn,$SQLR);
   $total=mysqli_num_rows($data);
   //echo $total;
   if($total>0){
    $SQL="UPDATE  marks SET  total_marks='$totalmarks', marks_scored='$marksscored' WHERE s_id= '$iid' AND course_id='$c_id';"; 
    //echo $SQL;
   if($conn->query($SQL)== true){
       $insert = true;
     //  echo "success";
   }}
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
    <title>UPDATE MARKS</title>
</head>
<body>
    <header><H1>COLLEGE OF ENGINEERING<br>UPDATE MARKS</H1></header>
    <nav class="id">
    <A class="btn " href="../php/teacher_home1.php">HOME</A>
        <A class="btn  " href="../html/insert_marks_attendance.html">INSERT</A>
        <A class="btn active" href="../html/update_marks_attendance.html">UPDATE</A>
        <A class="btn " href="../php/payslip.php">PAYSLIP</A>
        <A class="btn " href="../html/main_page.html">LOG OUT</A>
    </nav>
    <section >
        <?php
        error_reporting(0);
        if($insert == true)
        echo "UPDATION SUCCESSFUL!";
        else {
            echo "UPDATION FAILED BECAUSE DATA DOESNT EXIST!";
        }?>
  <DIV class="sec" >
        <form class="atr" method="POST" action="../php/update_marks.php">
        <label>STUDENT ID:</label>
            <input type="text" id="stud" name="studentid" required><br><br>
        
            <label>COURSE:</label>
                <input type="char" id="stud" name="cname" required><br><br>

                <label>TOTAL MARKS:</label>
                    <input type="text" id="stud" name="totalmarks" required><br><br>
        
            <label>MARKS SCORED:</label>
                <input type="text" id="GRADE" name="marksscored" required><br><br>
            <input type="submit" value="SUBMIT">
        </form>
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>
        </body>

     

</html>