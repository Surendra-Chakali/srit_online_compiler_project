<?php
error_reporting(0);
session_start();
include("db_connection.php");

if (isset($_POST['submit'])) {
    # code...
    $date = $_POST['date'];
    mysqli_query($conn, "UPDATE `examdate` SET `date`='$date' WHERE id='1' ");
    echo "<script>alert('Exam date updated');</script>  ";
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
        .function{box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;position: absolute;top: 54%;left: 50%;transform: translate(-50%, -50%);}
        input[type='date'],input[type='submit']
        {
            width: 100%;
            border: none;
            border-bottom: 1px solid gray; 
            outline: none;
        }
        form{
            width: 300px;
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
    <div class="p-5 function">
        <h5 class="text-center text-success">Set External Exam Date</h5>

        <form class="p-3" action="" method="post">
            <label for="date" class="pt-5">Choose date</label>
            <input type="date" class="mt-4 mb-4" id="date" name="date" required>
            <input type="submit" class="mt-4 mb-4 btn btn-success" name="submit" value="Set Exam date">
            
        </form>
    </div>


<!--     <div class="container p-4">
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Name</th>
                        <th>Rollnumber</th>
                    </tr>
                </thead>
                <tbody>
                   <?php

                        $sql = $conn->prepare("select * from student_registration");
                        $sql->execute();
                        $result = $sql->get_result();
                                          
                        while($row = $result->fetch_assoc())
                        {
                            $id = $row['std_id'];
                            $username = $row['name'];
                            $count = $row['username'];
                            ?>
                            <tr>
                                <td><?php echo($id); ?></td>
                                <td><?php echo($username) ?></td>
                                <td><?php echo($count) ?></td>
                            </tr>

                            <?php
                        }

                   ?>
                </tbody>
            </table>
            
        </div>
    </div> -->


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