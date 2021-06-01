
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
    $ID=$_SESSION["id"];
    //$iid=(int)$ID;
    $SQL="SELECT * FROM teacher WHERE t_id='$ID';";
    //echo $SQL;
    $data=mysqli_query($conn,$SQL);
    $total=mysqli_num_rows($data);
   // echo $total;
    $result=mysqli_fetch_assoc($data);
   // echo $result['designation'];
    $des=$result['designation'];
    $SQL1="SELECT * FROM payslip where designation='$des';";
    //echo $SQL1;
    $data1=mysqli_query($conn,$SQL1);
    $result1=mysqli_fetch_assoc($data1);

    $salary = $result1['basic_pay']+$result1['grade_pay']+$result1['allowances'];
   // echo $salary;
   // $DEPT=',$result['dept_id'],';
   //$dept= $result['dept_id'];
   //echo $dept;
    //$sql1="SELECT dept_name from dept where dept_id='$dept';";
    //$DATA1=mysqli_query($conn,$sql1);
    //$result1=mysqli_fetch_assoc($DATA1);
 //  echo $result1['dept_name'];
    
   // echo ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teacher_home.css">
    <title>PAYSLIP</title>
</head>
<body>
<?PHP
    
echo '
    <header><H1>COLLEGE OF ENGINEERING</H1><H3>PAYSLIP</H3></header>
  
    <nav class="id">
    <A class="btn " href="../php/teacher_home1.php">HOME</A>
    <A class="btn  " href="../html/insert_marks_attendance.html">INSERT</A>
    <A class="btn " href="../html/update_marks_attendance.html">UPDATE</A>
    <A class="btn active " href="../php/payslip.php">PAYSLIP</A>
    <A class="btn " href="../html/main_page.html">LOG OUT</A>
        
    </nav>
    
    <section >
        <DIV class="sec">
        
            <div class="atr">
        NAME:',$result['t_name'],'
        <BR><BR>
        </div>
            <div class="atr">
        ID:',$result['t_id'],'<BR><BR>
        </div>
        <div class="atr">
        DESIGNATION:',$result1['designation'],'<BR><BR>
        </div>
        <div class="atr">
        BASIC PAY:',$result1['basic_pay'],'<BR><BR>
        </div>
            <div class="atr">
        GRADE PAY:',$result1['grade_pay'],'<BR><BR>
        </div>
        <div class="atr">
        ALLOWANCE:',$result1['allowances'],'<BR><BR>
        </div>
        <div class="atr">
        TOTAL: ',$salary,'<BR><BR>
        </div>
        
           
        
        </DIV>
        </section>
    <FOOTER>
        PREPARED BY:<BR>YASHWANTH BT<BR>PRAVEEN VM<BR>MUHAMMED RAMEEZ M
    </FOOTER>';
    ?>
        </body>

     

</html>
