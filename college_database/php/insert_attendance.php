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
    $totalhours=$_POST["thours"];
    //echo $totalmarks;
    $presenthours=$_POST["phours"];
    $sql1="SELECT course_id FROM course WHERE course_name='$cname';";
    $data=mysqli_query($conn,$sql1);
    $result=mysqli_fetch_assoc($data);
    //echo $sql1;
  $c_id= $result['course_id'];
 // echo $c_id;
  // $total=mysqli_num_rows($data);
   //echo $total;
   $CHECKSQL="SELECT * FROM attendance WHERE s_id='$iid' AND course_id='$c_id';";
   $chckdata=mysqli_query($conn,$CHECKSQL);
   $ctotal=mysqli_num_rows($chckdata);
   if($ctotal==0){
    $SQL="INSERT INTO `attendance` ( `s_id`, `course_id`, `total_hours`, `present_hours`) VALUES ( '$iid', '$c_id', '$totalhours', '$presenthours');";
    //echo $SQL;
   if($conn->query($SQL)== true){
       $insert = true;
     //  echo "success";
   }}
   else{
       $t = 1;
   }
 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/OTHERS.CSS">
    <title>INSERT ATTENDANCE</title>
</head>
<body>
    <header><H1>COLLEGE OF ENGINEERING<br>INSERT ATTENDANCE</H1></header>
    <nav class="id">
    <A class="btn " href="../php/teacher_home1.php">HOME</A>
    <A class="btn active " href="../html/insert_marks_attendance.html">INSERT</A>
    <A class="btn " href="../html/update_marks_attendance.html">UPDATE</A>
    <A class="btn " href="../php/payslip.php">PAYSLIP</A>
    <A class="btn " href="../html/main_page.html">LOG OUT</A>
        
    </nav>
    <section >
        <?php
        if($insert == true){
        ECHO '<script> alert("INSERTION SUCCESSFUL"); </script>';}
        elseif($t==1)
        {
            ECHO '<script> alert("INSERTION FAILED BECAUSE ALREADY DATA EXIST"); </script>';
        }
        else {

        }?>
        <DIV class="sec" >
        <form class="atr" method="POST" action="../php/insert_attendance.php">
        <label>STUDENT ID:</label>
            <input type="text" id="stud" name="studentid" placeholder="enter student id" required><br><br><br>
        
            <label>COURSE NAME:</label>
                <input type="char" id="stud" name="cname" placeholder="enter course name" required><br><br><br>

                <label>TOTAL NO OF HOURS:</label>
                    <input type="text" id="stud" name="thours" placeholder="enter total number of hours" required><br><br><br>
        
            <label>TOTAL NO OF HOURS PRESENT:</label>
                <input type="text" id="GRADE" name="phours" placeholder="enter present number of hours" required><br><br><br><br>
            <input type="submit" value="SUBMIT">
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>
        </body>

     

</html>