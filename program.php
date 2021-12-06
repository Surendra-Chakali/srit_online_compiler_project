
<?php
session_start();
// error_reporting(0);
include('db_connection.php');
$username = $_SESSION['username'];
if (strlen($_SESSION['username']) == 0) {
    header('location: login.php');
 }
        $qid = $_GET['qns_id'];

        $st = $conn->prepare("SELECT * FROM `add_qns` WHERE qns_id = '$qid' ");
        // $st->bind_param("i", $qns_id);
        $st->execute();
        $rt = $st->get_result();
        $rt1 = $rt->fetch_assoc();
        // while($rt1 = $rt->fetch_assoc())
        // {
        $qns_id = $rt1['qns_id'];
        $qname = $rt1['question_name'];
        $input = $rt1['sample_input'];
        $output = $rt1['sample_output'];
        $_SESSION['output'] = $output;
        $_SESSION['qname'] = $qname;
        $_SESSION['qns_id'] = $qns_id;



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
        .function{box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;}
        
         
         
    </style>
</head>
<body>

<?php include('header.php');?>

    <div class="container pt-5 pl-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <p style="font-weight: bold;"><b>Problem statement</b></p>
                <p><?php echo "$qname";?></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12" align="right">
                Hello <b><?php echo "<span class='text-success'>$username</span>";?></b>
            </div>
        </div>
    </div>

    <div class="container pt-5 pl-5">
        <p style="font-weight: bold;"><b>Sample Input</b></p>
       <p><?php echo "$input";?></p>
    </div>
    <div class="container pt-5 pl-5">
       <p style="font-weight: bold;"><b>Sample Output</b></p>
       <p><?php echo "$output";?></p>
    </div>
    
   

    <div class="container p-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <form action="compile.php" method="post" name="f2" id="form">
                    <textarea style="width: 100%;height: 370px;border: none;outline: none;" name="code" placeholder="Write your code here" class="container p-4 function" required></textarea>
                    <textarea style="width: 100%;height: 70px;border: none;outline: none;" name="input" id="st" placeholder="Enter input values if need" class="container p-3 function"></textarea>
                    <input type="submit" name="run_by_mkr" id="cr" value="Compile & Run"style="outline: none;border: none;" class="btn-grad1 mt-4" id="st">

                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 result">
                <textarea style="width: 100%;height: 86%;border: none;outline: none;" name="output" id="div" placeholder="Your Result" class="container p-4 function" wrap="nowrap" disabled></textarea>
            </div>
        </div>
    </div>
    <div class="pb-5" align="center">
                <button type="submit" style="outline: none;border: none;" class="btn-grad" onclick="window.print()">Print Result</button>
            </div>

    <!-- jQuery Frameworks
    ============================================= -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#st").click(function(){
                $("#div").html("Loading.....");
            });
            
        });    
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('form').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "cpp.php",
                    datatype: "html",
                    data: $('form').serialize(),
                    success: function(result){
                        $('#div').html(result);
                    }
                });
            });
        });    
    </script>

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