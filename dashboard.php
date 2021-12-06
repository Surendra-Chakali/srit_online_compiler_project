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
        /*body{*/
       /*     background: url();
            background-size: cover;
            background-repeat: no-repeat;
        }*/
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
        h4{
            letter-spacing: 1px;
            background: linear-gradient(to bottom right, #A22FCE, #FF7000); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
        }
        



    </style>
</head>
<body>
<?php include('header.php');?>
<div class="p-5">
    <div class="row" align="center">
        <div class="col-lg-6 col-md-6 col-sm-10 col-12">
            <img src="backgroundImage.jpeg" alt="image" class="col-lg-10 col-md-10 col-sm-12 col-12">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-10 col-12 main" align="center">
            <h4 align="center">WELCOME</h4>
            <div class="pt-4">
                <table class="table table-borderless" width="40">
                    <tr>
                        <td class="text-center">Username</td>
                        <td><?php echo "<span style='text-transform:uppercase;'><b>$name</b></span>";?></td>
                    </tr>
                    <tr>
                        <td class="text-center">Roll Number</td>
                        <td><?php echo "<span style='text-transform:uppercase;'><b>$uname</b></span>";?></td>
                    </tr>
                    <tr>
                        <td class="text-center">Questions Completed</td>
                        <td><?php echo "<span class='text-success'><b>$output</b></span>";?></td>
                    </tr>
                </table>
               
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