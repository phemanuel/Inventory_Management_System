<?php
include "dbconfig.php";

$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$username = $_SESSION['user_name'];
$username1 = strtoupper($username);
$user_email = $_SESSION['user_email'];
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];
$duedate1 = $_SESSION['duedate'];
$prodsize = $_SESSION['prodsize'];
$duedate = date("d-m-Y", strtotime($duedate1)); 


if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='logout.php';
</script>";
}
else if ( empty ( $_SESSION['user_name'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='logout.php';
</script>";
}
else {

} 

//=======get the no of users
$sql="SELECT * FROM user_details WHERE clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
$activeuser = $count ;
$userleft = ($clientsize - $count);


 $ADM= $_SESSION['ADM'];
 $PMG= $_SESSION['PMG'];
 $WMG= $_SESSION['WMG'];
 $CMG= $_SESSION['CMG'];
 $HRG= $_SESSION['HRG'];
 $AMG= $_SESSION['AMG'];
 $RPT= $_SESSION['RPT'];
 $SMG= $_SESSION['SMG'];
 $TRD= $_SESSION['TRD'];
 $TRDREP= $_SESSION['TRDREP'];
$DEL= $_SESSION['DEL'];
$DIS= $_SESSION['DIS'];
$REB= $_SESSION['REB'];

$datekeep = date('Y-m-d');
$datekeep1 = date("jS F, Y", strtotime($datekeep));

//====all income-------
$result1 = mysqli_query($conn,"SELECT SUM(finalamount) AS value_sum FROM supply1 WHERE supplydate='$datekeep' and clientid='$clientid'"); 
$row1 = mysqli_fetch_assoc($result1); 
$sum1 = $row1['value_sum'];
//------------------------------------
//====income gadget sales-------
$result2 = mysqli_query($conn,"SELECT SUM(totalprofit) AS value_sum FROM supply1 WHERE supplydate='$datekeep' and clientid='$clientid'"); 
$row2 = mysqli_fetch_assoc($result2); 
$sum2 = $row2['value_sum'];
//------------------------------------

//====Expense-------
$result6 = mysqli_query($conn,"SELECT SUM(amount) AS value_sum FROM purchase1 WHERE purchasedate='$datekeep'  and clientid='$clientid'"); 
$row6 = mysqli_fetch_assoc($result6); 
$sum6 = $row6['value_sum'];
//------------------------------------

$totalincome = ($sum2);
$totalexpense = ($sum6);
?>


<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IMS :: <?php echo $clientname1?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
  <style type="text/css">
<!--
.style1 {color: #000000}
-->
  </style>
</head>

<body>
  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <p><strong><?php echo $clientname1 ;  ?></strong></p>
                 
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $username1 ;  ?></div>
              <a href="dashboarduser1.php" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> user Menu
              </a> 
              
              <div class="dropdown-divider"></div>
<a href="usersetting.php" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> User Settings
              </a> 
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="assets/img/logo1.png" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="dashboardcheck.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
                   <li class="menu-header">IMS MENU</li>
                   <li><a class="nav-link" href="link11.php"><i data-feather="user-check"></i><span>Admin</span></a></li>
            <li><a class="nav-link" href="link13.php"><i data-feather="copy"></i><span>Product Management</span></a></li>   
            <li><a class="nav-link" href="link22.php"><i data-feather="copy"></i><span>Expense</span></a></li>     
            <li><a class="nav-link" href="link19.php"><i data-feather="layout"></i><span>Create Order</span></a></li>      
            <li><a class="nav-link" href="link18.php"><i data-feather="file"></i><span>Sales Report</span></a></li>
             
            <li><a class="nav-link" href="link16.php"><i data-feather="user-check"></i><span>HR Management</span></a></li>
            <li><a class="nav-link" href="link12.php"><i data-feather="layout"></i><span>Account Management</span></a></li>
            <li><a class="nav-link" href="link15.php"><i data-feather="user-check"></i><span>Customer Management</span></a></li>
            
            
            <li><a class="nav-link" href="link23.php"><i data-feather="layout"></i><span>Pre-Order/Request</span></a></li>
            <li><a class="nav-link" href="link25.php"><i data-feather="layout"></i><span>Company Asset</span></a></li>
            <li class="menu-header">Logout</li>
            <li><a class="nav-link" href="logout.php"><i data-feather="file"></i><span>Logout</span></a></li>
             
          </ul>
        </aside>
      </div>
      <!-- Main Content -->

      <div class="main-content">
        <section class="section">

          <div class="card">
                  <div class="card-header">
                    <h4>Income and Expense Report for <?php echo $datekeep ;  ?> | <a href="files/placcount.php" >View Report Analysis</a></h4>
                  </div>
                  <div class="card-header">
                    <h4>Query by Date</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-inline" action="iereportdate.php">
                      <label >Start Date</label>&nbsp;&nbsp;&nbsp;
                      <input type="date" class="form-control mb-2 mr-sm-2" id="startdate" name="startdate" 
                        >
                      
                      <div class="input-group mb-2 mr-sm-2">
                        <label>End Date</label>&nbsp;&nbsp;&nbsp;
                        <input type="date" class="form-control" id="enddate" name="enddate" 
                          >
                      </div>
                      <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                    </form>
                  </div>
                </div>

           <div class="font-15 style1"><button type="button" class="btn btn-dark">
                        INCOME <span class="badge badge-transparent"></span>
                      </button></div><br>
          <div class="row ">
           

             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 style1"></h5>
                          <h2 class="font-15 style1">Total Sales</h2>
                          <h2 class="mb-3 font-15"> <img src="plus.png"> <?php echo number_format($sum1,2) ;?></h2>
                          <h2 class="font-15 style1">Profit</h2>
                          <h2 class="mb-3 font-15"> <img src="plus.png"><?php echo number_format($sum2,2) ;?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/d2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
           




          </div>
          

         
         

 <div class="font-15 style1"><button type="button" class="btn btn-primary">
                        EXPENSE <span class="badge badge-transparent"></span>
                      </button></div><br>
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 style1"></h5>
                          <h2 class="mb-3 font-15"><img src="plus.png"> <?php echo number_format($sum6,2) ;?></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/ac2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

             
            
            

          </div>          
            
<div class="row">
              
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-purple">
                    <i class="fas fa-door-closed"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="pull-right">TOTAL INCOME</h4>
                    </div><br>
                    <div class="card-body pull-right">
                      <img src="plus.png"> <?php echo number_format($totalincome,2) ;?>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-green">
                    <i class="fas fa-door-open"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="pull-right">TOTAL EXPENSE</h4>
                    </div><br>
                    <div class="card-body pull-right">
                     <img src="plus.png"> <?php echo number_format($totalexpense,2) ;?>
                    </div>
                  </div>
                  
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-cyan">
                    <i class="fas fa-compass"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="pull-right">DIFFERENCE</h4>
                    </div><br>
                    <div class="card-body pull-right">
                     <img src="plus.png"> <?php echo number_format($totalincome - $totalexpense,2) ;?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
         

         
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Powered by EITC APPS</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>