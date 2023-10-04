<?php
session_start();

$_SESSION['appversion'] = "Trial" ;
$apptype = "INVENTORY MANAGEMENT SYSTEM" ;
$appabbrv = "IMS" ;

?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IMS :: Register</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon1.png' />
</head>

<body background="assets/img/back2.jpg">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">

              <div class="card-header">                
                <h4 align="center"><img src="assets/img/banner1.png" align="center"></h4>
                <br>
              </div>
              
             
              <div class="card-body">
                <form method="POST" action="saveplan.php" enctype="multipart/form-data" class="needs-validation" >
                  <div class="form-group">
                    <label for="email">Company Name</label>
                    <input id="clientid" type="text" class="form-control" name="clientid" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please enter your Company Name
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="clientemailaddy" type="text" class="form-control" name="clientemailaddy" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please enter your email address
                    </div>
                  </div>    
                  <div class="form-group">
                    <label for="email">Mobile No</label>
                    <input id="clientmobileno" type="text" class="form-control" name="clientmobileno" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please enter your mobile no
                    </div>
                  </div>  
                  
                  <div class="form-group">
                    <label for="email">Company Logo(Jpeg Format)</label>
                    <input type="file" name="file" id="file" class="form-control" required autofocus>                  
                    <div class="invalid-feedback">
                      Please upload a logo
                    </div>
                  </div>            
                                    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Register
                    </button>
                    <input name="clientplan1" type="hidden" id="clientplan1" value="TRIAL" />
                    <input name="apptype" type="hidden" id="apptype" value="<?php echo $apptype; ?>" />
                    <input name="appabbrv" type="hidden" id="appabbrv" value="<?php echo $appabbrv; ?>" />
                  </div>
                   <div class="mt-5 text-muted text-center">
              <a href="#">EITC APPS</a>
            </div>
                </form>               
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>