<?php
// error_reporting(0);
session_start();
include("db_connection.php");

// Insert questions into database
if (isset($_POST['submit'])) {
    # code...
    $qname = $_POST['question'];
    $input = $_POST['input'];
    $output = $_POST['output'];

    $sql1 = $conn->prepare("SELECT * FROM `add_qns` WHERE question_name = ? and sample_input = ? and sample_output = ?");
    $sql1->bind_param("sss", $qname, $input, $output);
    $sql1->execute();
    $result = $sql1->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        # code...
        echo "<script>alert('Question is already there in database');</script>";
    }
    else
    {
        $sql = $conn->prepare("INSERT INTO `add_qns`(`question_name`, `sample_input`, `sample_output`) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $qname, $input, $output);
        $sql->execute();
        if ($sql) {
            # code...
            echo "<script>alert('Question uploaded');</script>";
        }
        else echo "<script>alert('error with code');</script>";
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avanni">

    <!-- ========== Page Title ========== -->
    <title>SRIT</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="sritlogo.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
         .nav{
            
            list-style-type: none;
        }
        .nav{
              display: flex;
              justify-content:space-around;
              /*align-items: center;*/
              
              position: relative;top: 40%;
              height: 40px;
              line-height: 40px;
        }
        .function{
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;
        }
        .btn-grad {background-image: linear-gradient(to right, #FF512F 0%, #F09819  51%, #FF512F  100%)}
        .btn-grad {
            margin: 10px;
            padding: 10px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          form input[type='text']
          {
            border: none;
            outline: none;
            /*margin: 10px;*/
            border-bottom: 1px solid lightgray;
            width: 100%;
          }
    </style>
</head>
<body>

<div class="container pt-2">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <img src="sritlogo.png" alt="Logo" class="float-left col-lg-3 col-md-3 col-sm-3 col-5">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                 <ul class="nav">
                    <li><a href="addQuestions.php">Add questions</a></li>
                    <li><a href="checkStudentsResults.php">performance</a></li>
                    <li><a href="labdate.php">External lab Date</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>
    </div><br>
    
    <div class="container p-4 pt-4 function col-lg-5 col-md-5 col-sm-7 col-10">
        <form action="" method="post">
            <div class="p-3">
                <label for="question">Question</label><br>
                <input class="p-2" type="text" name="question" placeholder="Enter question" required id="question">
            </div>
             <div class="p-3">
                <label for="input">sample Input</label><br>
                <input class="p-2" type="text" name="input" placeholder="Enter input" required id="input">
            </div>
             <div class="p-3">
                <label for="output">Expected Output</label><br>
                <input class="p-2" type="text" name="output" placeholder="Enter output" required id="output">
            </div>
             <div class="p-2" align="center">
                
                <input type="submit" name="submit" class="btn-grad" style="outline: none;border: none;">
            </div>
        </form>
    </div>


    <!-- jQuery Frameworks
    ============================================= -->
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