<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
        $insert = true;
    }
    $ID=$_POST["studentid"];
    $iid=(int)$ID;
   
    $cname=$_POST["cname"];
   
    $totalhours=$_POST["thours"];
    
    $presenthours=$_POST["phours"];
    $sql1="SELECT course_id FROM course WHERE course_name='$cname';";
    $data=mysqli_query($conn,$sql1);
    $result=mysqli_fetch_assoc($data);
   
  $c_id= $result['course_id'];
 
   $SQLR="SELECT * FROM attendance WHERE s_id= '$iid' AND course_id='$c_id';"; 
   $data=mysqli_query($conn,$SQLR);
   $total=mysqli_num_rows($data);
   
   if($total>0){
    $SQL="UPDATE  attendance SET  total_hours='$totalhours', present_hours='$presenthours' WHERE s_id= '$iid' AND course_id='$c_id';"; 
   
   if($conn->query($SQL)== true){
       $insert = true;
    
   }}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/OTHERS.CSS">
    <title>UPDATE ATTENDANCE</title>
</head>
<body>
    <header><H1>COLLEGE OF ENGINEERING<br>UPDATE ATTENDANCE</H1></header>
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
        ECHO "UPDATION SUCCESSFUL!";
        else {
            ECHO "UPDATION FAILED BECAUSE DATA DOESNT EXIST!";
        }?>
        <DIV class="sec" >
        <form class="atr" method="POST" action="../php/update_attendance.php">
        <label>STUDENT ID:</label>
            <input type="text" id="stud" name="studentid" required><br><br>
        
            <label>COURSE:</label>
                <input type="char" id="stud" name="cname" required><br><br>

                <label>TOTAL NO OF HOURS:</label>
                    <input type="text" id="stud" name="thours" required><br><br>
        
            <label>TOTAL NO OF HOURS PRESENT:</label>
                <input type="text" id="GRADE" name="phours" required><br><br>
            <input type="submit" value="SUBMIT">
        </form>
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>
        </body>

     

</html>