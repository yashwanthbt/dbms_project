<?php

    
    session_start();
    $id=$_SESSION["iid"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

   
    
    
    $SQL="SELECT * FROM stuhome WHERE s_id='$id';";
   // echo $SQL;
    $data=mysqli_query($conn,$SQL);
    $total=mysqli_num_rows($data);
   // echo $total;
    $result=mysqli_fetch_assoc($data);
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
    <link rel="stylesheet" href="../css/student_home.css">
    <title>STUDENT HOME PAGE</title>
</head>

<body>
<?PHP
    
echo '
    <header><H1>COLLEGE OF ENGINEERING</H1></header>
  
    <nav class="id">
    <A class="btn active" href="../php/students_home1.php">HOME</A>
    <A class="btn " href="../php/student_attendance.php">ATTENDANCE</A>
    <A class="btn " href="../php/student_grades.php">GRADES</A>
    <A class="btn " href="../php/student_teacherdetails.php">FACULTY DETAILS</A>
    <A class="btn " href="../html/main_page.html">LOG OUT</A>
        
    </nav>
    
    <section >
    
        <DIV class="sec">
            <div class="atr">
        NAME:',$result['s_name'],'
        <BR>
        </div>
            <div class="atr">
        ID:',$result['s_id'],'<BR>
        </div>
            <div class="atr">
        D_O_B:',$result['s_dob'],'<BR>
        </div>
            <div class="atr">
        PHONE:',$result['s_mobile'],'<BR>
        </div>
            <div class="atr">
        E-MAIL:',$result['s_email'],'<BR>
        </div>
            <div class="atr">
        GENDER:',$result['s_gender'],'<BR>
        </div>
            <div class="atr">
        BRANCH:',$result['dept_name'],'<BR>
        </div>
            <div class="atr">
        BLOOD GROUP:',$result['s_bloodgroup'],'<BR><BR><BR>
        </div>
        
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>';

    mysqli_close($conn);
    ?>
        </body>

     

  
     

</html>