<?php
session_start();
include('db_connection.php');
    $sql1 = mysqli_query($conn, "SELECT * FROM examdate ");
    $res = mysqli_fetch_assoc($sql1);
    $dt = $res['date'];

    $date = date("Y-m-d");

   if ($dt !=$date) {
       # code...
   
    ?>
       <script type="text/javascript">
       alert("You are coming too early");
       setTimeout(function(){
       window.location.href = "main.php";
       },0);
       </script>
    <?php
    
}
else
{
    $opt =  $_SESSION['output2'];
    $qname =$_SESSION['qname2'];
    $qn_id =$_SESSION['qns_id2'];

    $opt1 =  $_SESSION['output1'];
    $qname1 =$_SESSION['qname1'];
    $qn_id1 =$_SESSION['qns_id1'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avanni">
    <title>SRIT - STUDENT DASHBOARD</title>
    <link rel="shortcut icon" href="img/sritlogo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/107525cc11.js"></script>
    <style type="text/css">
        .nav{
            
            list-style-type: none;
        }
        .nav{
              display: flex;
              justify-content:space-around;
              position: relative;top: 40%;
              height: 40px;
              line-height: 40px;
        }
        .main{
            position: relative;
            
            top: 70px;
            /*transform: translate(-50%, -50%);*/
        }

    </style>
</head>
<body>
<?php include('header.php');?>
<div class="container" style="margin-top: 4em;">
    <h5 class="text-center">Your External Exam Questions</h5>
<?php

       
        $sql1 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id = '$qn_id' ");
        $res = mysqli_fetch_assoc($sql1);
        $qn_id = $res['qns_id'];
        $qname = $res['question_name'];
        $input = $res['sample_input'];
        $output = $res['sample_output'];

        $sql2 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id = '$qn_id1' ");
        $res = mysqli_fetch_assoc($sql2);
        $qn_id1 = $res['qns_id'];
        $qname1 = $res['question_name'];
        $input1 = $res['sample_input'];
        $output1 = $res['sample_output'];


?>

  <form method="post" style="margin-top: 4em;">
              <div class="p-2" align="center">
                
                <a class="" href="program.php?qns_id=<?php echo($qn_id)?>"><?php echo $qn_id;?>
                   
                </a>
                <a class="" href="program.php?qns_id=<?php echo($qn_id)?>"><?php echo $qname;?></a>
              </div>
        </form>
        <form method="post">
              <div class="p-2" align="center">
                
                <a class="" href="program.php?qns_id=<?php echo($qn_id1)?>"><?php echo $qn_id1;?>
                   
                </a>
                <a class="" href="program.php?qns_id=<?php echo($qn_id1)?>"><?php echo $qname1;?></a>
              </div>
        </form>
</div>
    <script src="assets/js/validation_js.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.html"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
<?php } ?>