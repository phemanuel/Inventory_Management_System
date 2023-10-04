<?php
include "dbconfig.php";

$yearkeep = date('Y');
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>EITC APPS :: Making a difference</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Utilizer Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
    <!-- //Fonts -->
    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
    </style>
</head>

<body>
    <!-- main -->
    <div class="main-top-intro">
        <div class="bg-layer">
            <!-- header -->
            <div class="wrapper">
                <header>
                    <div class="header-w3layouts">
                        <h1><img src="images/footer-logo.png" width="200" height="69"></h1>
                  </div>
<div class="nav_w3pvt">
                        <nav>
                            <label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
                            <input type="checkbox" id="drop" />
                            <ul class="menu">
                                <li class="active"><a href="../index.php">Home</a></li>
                                
                            </ul>
          </nav>
                    </div>
                    <div class="buttons mt-lg-0 mt-3 ml-auto">
                        <div class="form-w3layouts-grid">
                            <form action="#" method="post" class="newsletter">
                                <input class="search" type="search" placeholder="" required="">
                                <button class="form-control btn" value=""><span class="fa fa-search"></span></button>
                                <div class="clear"></div>
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>


                </header>
                <!-- //header -->
                <div class="content-inner-info">
                    <h2>Account Setup</h2>
                    <div class="content-w3layouts-main">

                        <div class="form-w3ls-left-info">
                            <form action="saveplan.php" method="post" enctype="multipart/form-data">

								
								  <input name="clientid" type="text" id="clientid" placeholder="Company Name" required="" />
								  
								  
								  <input name="clientemailaddy" type="email" id="clientemailaddy" placeholder="Email Address" required="" />
								  
								  <input name="clientmobileno" type="text" id="clientmobileno" placeholder="Mobile No" required="" />
                                   <select name="clientsub" id="clientsub">
    <option>Monthly</option>
    <option>Annually</option>
  </select>
                                 
								<br><br>
							      <input type="file" name="file" id="file">
								  <span class="style1">Company Logo (Jpeg Format)</span>
							  <div class="links">
                                  

                                </div>
                                <div class="bottom">
                                    <button class="btn" type="submit">Setup</button>
                                    <button class="btn reg" type="reset">Reset</button>
                                </div>

                            </form>
                      </div>

                    </div>
                </div>
                <!-- copyright -->
                <div class="copy-w3layouts-inf">
                    <p>© 2018 - <?php echo $yearkeep ;?> IMS. All rights reserved | <a href="#">POWERED BY EITC APPS</a></p>
                    <ul class="list-unstyled w3layouts-icons">
                        <li>
                            <a href="#" class="face-b">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twit">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dribble">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                        
                    </ul>
                    <div class="clear"></div>
                </div>
                <!-- //copyright -->
            </div>
        </div>
    </div>
    <!-- //main -->

</body>

</html>
