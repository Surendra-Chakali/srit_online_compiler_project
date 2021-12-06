<?php
error_reporting(0);
session_start();
include("db_connection.php");
 $numerror = $smlltrerror = $capltrerror = $specialcharerror = "";
# User Credentials
if(isset($_POST['submit']))
{
$name =$_POST['name'];
$uname = strtolower($_POST['username']);
$password =$_POST['password'];
                        if(preg_match("@[A-Z]@", $password))
                        {
                            if(preg_match("@[a-z]@", $password))
                            {
                                if(preg_match("@[0-9]@", $password))
                                {
                                    if(preg_match('/[!@#$%^&*()\,.<>:;[]|]/', $password))
                                        {
                        $_SESSION["username"] = $uname;
                        $_SESSION["name"] = $name;
                        $_SESSION["password"] = $password;
                        $sql = $conn->prepare("select username from student_registration where username = ?");
                        $sql->bind_param("s", $uname);
                        $sql->execute();
                        $result = $sql->get_result();
                        $row = $result->fetch_assoc();
                        $username = $row['username'];

                    // $sql1 = mysqli_query($conn,"select username from student_registration where username = '$uname'");
                    // $result = mysqli_fetch_array($sql1);
                    // $Dbemail = $result['email'];

                    if($username == $uname) 
                    {
                        // echo "<script>alert('Username is already registered');</script>";
                        ?>
                             <script type="text/javascript">
                                 alert("Username is already registered");
                                 setTimeout(function(){
                                    window.location.href = "login.php";
                                 },0);
                             </script>
                             <?php 
                    }
                    else{
                        
                    # insert data into database
                        $sql1 = $conn->prepare("INSERT INTO student_registration( `username`, `password`, `name`) VALUES(?, ?, ?)");
                        $sql1->bind_param("sss", $uname, $password, $name);
                        $sql1->execute();

                        // $sql = mysqli_query($conn,"INSERT INTO registration(`email`, `mobile`, `password`) VALUES('$email','$mobile','$password')");
                        if($sql1)  
                        {
                             // echo "<script>alert('Registered Successfully');</script>";
                             ?>
                             <script type="text/javascript">
                                 alert("Registered succcessfully");
                                 setTimeout(function(){
                                    window.location.href = "login.php";
                                 },0);
                             </script>
                             <?php 
                        }
                        else{echo "<h4 class='text-danger text-center'>Error in registration</h4";}
                        }
                        }else{$specialcharerror = "At least one Special character is required";}
                        }else{$numerror = "At least one number is required";}
                        }else{$smlltrerror = "At least one Small letter is required";}
                        }else{$capltrerror = "At least one Capital letter is required";}
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">

    @media only screen and (max-width: 769px)
      { 
        .rightnav{display: none;}
      }

        input[type='text'],input[type='email'],input[type='password']
        {
            border: none;
            outline: none;
            border-bottom: 1px solid gray;
            width: 70%;
        }

        .error{width: 70%;}
         .btn-grad {background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%);}
         .btn-grad {text-transform: uppercase;transition: 0.5s;background-size: 200% auto;color: white;box-shadow: 0 0 20px #eee;border-radius: 40px;display: block;width: 70%; border:none;}

          .btn-grad:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
          }
         
         .model{
            box-shadow: 4px 3px 14px 7px lightgray;
            padding: 0;
            margin: 0; 
            /*position: relative;*/
            width: 400px;
            height: 440px;
            position: absolute;
            left: 50%;
            top: 48%;
            transform: translate(-50%, -50%);
         }
         .text-grad{background: linear-gradient(to bottom right, #A22FCE, #FF7000); -webkit-background-clip: text; -webkit-text-fill-color: transparent;}
         .passerror{display: none;}
    </style>
</head>
<body>

<!-- <div class="history-area default-padding-top container" align="center">
    <div class="row m-1"> -->
        <div class="model col-10" style="border-radius: 20px;">
            <svg style="border-radius: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e7008a" fill-opacity="1" d="M0,192L80,160C160,128,320,64,480,85.3C640,107,800,213,960,240C1120,267,1280,213,1360,186.7L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
            <h3 class="mb-1 text-center text-grad">SIGN UP</h3>
            <form action="" method="post" class="pt-5 pr-5 pl-5">
                <div class="mb-4" align="center">
                    <input type="text" class="text-center" name="name" placeholder="Your Name" required>
                </div>
                <div class="mb-4" align="center">
                    <input type="text" class="text-center" name="username" placeholder="Your Rollnumber" maxlength="10" minlength="10" required>
                </div>

                <div class="mb-4" align="center">
                   <!--  <label for="email">Mobile</label><br> -->
                    <input type="password" class="text-center" name="password" placeholder="Your Password" id="password" required>
                    <p class="text-danger passerror">Your password must contain at least 8 characters includes one Capital letter, one small letter, one special character and one number.</p>
                    <p class="text-danger text-left error"><?php echo($numerror);?></p>
                    <!-- <p class="text-danger text-left error"><?php echo($passworderror);?></p> -->
                    <p class="text-danger text-left error"><?php echo($smlltrerror);?></p>
                    <p class="text-danger text-left error"><?php echo($capltrerror);?></p>
                    <p class="text-danger text-left error"><?php echo($lengtherror);?></p>
                    <p class="text-danger text-left error"><?php echo($specialcharerror);?></p>
                </div>

                <div align="center" class="mt-4 mb-4">
                    <input type="submit" class="btn-grad  p-2" name="submit" id="submit">
                </div>
            </form>
            <hr><p class=" text-center">Already have an account, lets <a href="login.php" class="text-grad">Login</a></p>
        </div>

</body>
</html>
<script type="text/javascript" src="assets/js/validation.js"></script>