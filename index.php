<!DOCTYPE html>
<html lang="en">
<head>



    <style type="text/css">
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
body{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(29, 29, 29);
    color: blanchedalmond;
}
h1{
    font-size: 40px;
    font-weight: 800;   
}
    </style>
    <script>
        function liveView(response) {
    document.getElementById('visits').innerText = response.value;
}
// The function is called in the CDN on HTML.
    </script>
    <script src="https://api.countapi.xyz/hit/localhost/srit/visits?callback=liveView" async></script>





    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avanni">

    <!-- ========== Page Title ========== -->
    <title>SRIT </title>

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
        h2{
            letter-spacing: 1px;
            background: linear-gradient(to bottom right, #A22FCE, #FF7000); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
            position: absolute;
            left: 50%;
            top: 48%;
            transform: translate(-50%, -50%);
        }
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
        .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  section{
    position: absolute;
    left: 50%;
    top: 57%;
    transform: translate(-50%, -50%);
      }
          @media only screen and (min-width: 768px)
        {
            .navigate{display: none;}
            .wrong{display: none;}
            #nav{display: flex;}
        }

    @media only screen and (max-width: 767px)
        {
            #navigate{cursor: pointer;}
            #wrong{display: none;cursor: pointer;}
            .result{margin-top: 40px;}
            .result .function{height: 400px;}
            #nav{display: none;}
            .header{margin-top: 10px;}
            /*.navigate{display: block;}*/
            /*.navigate:hover .nav{display: block;}*/
            #nav{
                background-color: tomato;
                width: 140%;
                margin-left: -70px;
                height: 120px;
                position: absolute;
                top: 120%; 
            }
            #nav li a{display: block;text-decoration: none;color: white;margin-left: 20px;text-align: center;}
            #nav li{
                
                width: 100%;
                text-align: center;
                display: block;
                /*margin-bottom: -10px;*/
            }
            #nav li:hover{
                background-color: #CC4F38;
            }
            section{
            position: absolute;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
           }
           .head img{
            margin-top: 20px;
           }

        }
    </style>
  
</head>
<body>
   <div class="container pt-2 header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                <a href="index.php"><img src="sritlogo.png" alt="Logo" class="float-left col-lg-3 col-md-3 col-sm-3 col-5"></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-4 bar">
                 <ul class="nav" id="nav">
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <i class="fas fa-bars float-right navigate" id="navigate" onclick="navigation()"></i>
                <i class="fas fa-times float-right wrong" id="wrong" onclick="wrong()"></i>
            </div>
        </div>
    </div>

<section class="container pt-5">
    <div id="demo" class="carousel slide" data-ride="carousel" data-interval="1700" data-pause=false>

  <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <!-- <li data-target="#demo" data-slide-to="1"></li> -->
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="sritslide1.jpg" alt="Los Angeles">
            </div>
            <!-- <div class="carousel-item">
              <img src="sritslide2.jpg" alt="Chicago" width="1100" height="500">
            </div> -->
            <div class="carousel-item">
              <img src="slide3.jpg" alt="New York" width="1100" height="500">
            </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
    </div>
</section>


  <h1 style="margin-top: 4.9em;">This page got <span id="visits"></span> views.</h1>

<script type="text/javascript">
    function navigation(){
            document.getElementById('nav').style.display = 'block';
            document.getElementById('navigate').style.display = 'none';
            document.getElementById('wrong').style.display = 'block';

        }    
        function wrong(){
            document.getElementById('nav').style.display = 'none';
            document.getElementById('navigate').style.display = 'block';
            document.getElementById('wrong').style.display = 'none';
        }
</script>
</body>
</html>