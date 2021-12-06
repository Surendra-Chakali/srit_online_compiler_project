<?php
error_reporting(0);
session_start();
include("db_connection.php");

if (strlen($_SESSION['username']) == 0) {
    header('location: login.php');
 }

// Fetching usernam eform student accounts
$uname = $_SESSION['username'];

$sql = $conn->prepare("select * from student_registration where username = ?");
$sql->bind_param("s", $uname);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$name = $row['name'];
$s_id = $row['std_id'];


// $s = $conn->prepare("SELECT * FROM `student_registration` WHERE username = ? ");
// $s->bind_param("s", $username);
// $s->execute();
// $r = $s->get_result();
// $r1 = $r->fetch_assoc();
// $s_id = $r1['std_id'];
// echo "$s_id";
    $sql1 = $conn->prepare("SELECT count(qns_id) as qns_id FROM `std_ans_qns` WHERE std_id = ? ");
    $sql1->bind_param("i", $s_id);
    $sql1->execute();
    $result = $sql1->get_result();
    $row = $result->fetch_assoc();
    $qns_id = $row['qns_id'];
    // // echo "$qns_id";

    $sq1 = $conn->prepare("SELECT count(qns_id) as qns_id FROM `add_qns` ");
    $sq1->execute();
    $resut = $sq1->get_result();
    $rw = $resut->fetch_assoc();
    $q_id = $rw['qns_id'];
    // echo "$q_id";

    if ($qns_id == $q_id) {
        # code...
        $output = " All";
    }
    else
    {
        $output = "$qns_id";
    }

if (isset($_POST['ext'])) {
    # code...
        $st = $conn->prepare("SELECT COUNT(qns_id) AS qns_id FROM add_qns ");
        $st->execute();
        $rt = $st->get_result();
        $rt1 = $rt->fetch_assoc();
        $qns_id = $rt1['qns_id'];
        
        $qns_count =  $qns_id/2;
        $sql1 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id <= '$qns_count' ORDER BY RAND() LIMIT 1");
        $res = mysqli_fetch_assoc($sql1);
        $qn_id = $res['qns_id'];
        $qname = $res['question_name'];
        $input = $res['sample_input'];
        $output = $res['sample_output'];

        $sql2 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id > '$qns_count' ORDER BY RAND() LIMIT 1");
        $res = mysqli_fetch_assoc($sql2);
        $qn_id1 = $res['qns_id'];
        $qname1 = $res['question_name'];
        $input1 = $res['sample_input'];
        $output1 = $res['sample_output'];

         $_SESSION['output2'] = $output;
        $_SESSION['qname2'] = $qname;
        $_SESSION['qns_id2'] = $qn_id;

         $_SESSION['output1'] = $output1;
        $_SESSION['qname1'] = $qname1;
        $_SESSION['qns_id1'] = $qn_id1;

        header('location:qnsSelected.php');       
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avanni">
    <title>SRIT - STUDENT DASHBOARD</title>
    <link rel="shortcut icon" href="sritlogo.png" type="image/x-icon">
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
        .function{box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;}
        .function a{display: block;padding: 1em;background-color: #1E90FF;}
        .function a:hover{text-decoration: none;background-color: #00BFFF;}
        input{
            display: block;
            border: none;
            background-color: #1E90FF;
            padding: 1em;
            width: 100%;
        }


    </style>
</head>
<body>
<?php include('header.php');?>
<div class="p-5 container" align="center" style="margin-top: 3em;">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-10 col-12">
            <div class="function" align="center">
                <div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQribEfOLcnIcN5Z87opV1i5M1gHHgBS3L4vQ&usqp=CAU" width="100%" height="100%" alt="Lab Programs">
                </div>
                <div>
                    <form action="" method="post">
                    <p><input type="submit" name="ext" class="text-white" value="External Test"></p>
                </form>
                </div>
            </div>
        </div>
         <div class="col-lg-4 col-md-6 col-sm-10 col-12">
            <div class="function" align="center">
                <div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQribEfOLcnIcN5Z87opV1i5M1gHHgBS3L4vQ&usqp=CAU" width="100%" height="100%" alt="Lab Programs">
                </div>
                <div>
                    <p><a href="" data-toggle="modal" data-target="#tpo_login" class="text-white"> Lab Programs</a></p>
                </div>
            </div>
        </div>
</div>
</div>

    <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="tpo_login" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="mt-4 mb-3">
            <h5 class="modal-title text-center text-success"><span style="color: gray;font-size: 18px;">Hi</span> <?php echo "&nbsp;&nbsp;$username"?>&nbsp;&nbsp;&nbsp; <span style="color: gray;font-size: 17px;">select question</span></h5>
        </div>
        <div class="modal-body">
<?php

$sql = $conn->prepare("select * from add_qns");
 $sql->execute();
 $res = $sql->get_result();
 while ($row = $res->fetch_assoc()) {
 
 $qns_id =$row['qns_id'];
 $qns_name =$row['question_name'];

?>
          <form method="post">
              <div class="p-2">
                
                <a class="" href="program.php?qns_id=<?php echo($qns_id)?>"><?php echo $qns_id;?>
                   
                </a>
                <a class="" href="program.php?qns_id=<?php echo($qns_id)?>"><?php echo $qns_name;?></a>
              </div>
        </form>

       <?php } ?>
        </div>
      </div>
      
    </div>
  </div>
</div>


<!-- External exam model -->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="external" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="mt-4 mb-3">
            <h5 class="modal-title text-center text-success">External Exam</h5>
        </div>
        <div class="modal-body">
<?php

        $st = $conn->prepare("SELECT COUNT(qns_id) AS qns_id FROM add_qns ");
        $st->execute();
        $rt = $st->get_result();
        $rt1 = $rt->fetch_assoc();
        $qns_id = $rt1['qns_id'];
        
        $qns_count =  $qns_id/2;
        $sql1 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id <= '$qns_count' ORDER BY RAND() LIMIT 1");
        $res = mysqli_fetch_assoc($sql1);
        $qn_id = $res['qns_id'];
        $qname = $res['question_name'];
        $input = $res['sample_input'];
        $output = $res['sample_output'];

        $sql2 = mysqli_query($conn, "SELECT * FROM add_qns WHERE qns_id > '$qns_count' ORDER BY RAND() LIMIT 1");
        $res = mysqli_fetch_assoc($sql2);
        $qn_id1 = $res['qns_id'];
        $qname1 = $res['question_name'];
        $input1 = $res['sample_input'];
        $output1 = $res['sample_output'];


?>
          <form method="post">
              <div class="p-2">
                
                <a class="" href="program.php?qns_id=<?php echo($qn_id)?>"><?php echo $qn_id;?>
                   
                </a>
                <a class="" href="program.php?qns_id=<?php echo($qn_id)?>"><?php echo $qname;?></a>
              </div>
        </form>
        <form method="post">
              <div class="p-2">
                
                <a class="" href="program.php?qns_id=<?php echo($qn_id1)?>"><?php echo $qn_id1;?>
                   
                </a>
                <a class="" href="program.php?qns_id=<?php echo($qn_id1)?>"><?php echo $qname1;?></a>
              </div>
        </form>
       <?php ?>
        </div>
      </div>
      
    </div>
  </div>
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