<?php
//include "dbconfig.php";
require "income_expense.php";

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
$DELTRS= $_SESSION['DELTRS'];



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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
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
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Income/Expense chart</h4>
                  <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Year</a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2020</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2021</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2022</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2023</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2024</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2025</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2026</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2027</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2028</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2029</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>2030</a>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary"></a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-9">
                    <div style="width: 80%; margin: auto;">
                    <canvas id="combinedChart" style="width:100%;max-width:700px"></canvas>
                     </div>
                      <div class="row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="m-b-0"><?php echo "=N=" . number_format($totalincome,2) ;  ?></h5>
                              <p class="text-muted font-14 m-b-0">Total Income</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                class="col-orange"></i>
                              <h5 class="m-b-0"><?php echo "=N=" . number_format($totalexpense,2);  ?></h5>
                              <p class="text-muted font-14 m-b-0">Total Expense</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="mb-0 m-b-0"><?php echo "=N=" . number_format($diff,2) ?></h5>
                              <p class="text-muted font-14 m-b-0">Difference</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>       

          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h6 class="font-15 style1">&nbsp;</h6>
                          <h2 class="mb-3 font-16"><strong><a href="iereportcheck.php">INCOME/EXPENDITURE</a></strong></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <a href="iereportcheck.php"><img src="assets/img/banner/ac1.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h6 class="font-15 style1">&nbsp;</h6>
                          <h2 class="mb-3 font-16"><strong><a href="files/profitaccount.php">SALES PROFIT ANALYSIS</a></strong></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <a href="files/profitaccount.php"><img src="assets/img/banner/ac2.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

            
             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h6 class="font-15 style1">&nbsp;</h6>
                          <h2 class="mb-3 font-16"><strong><a href="files/ordercheck.php">REPRINT INVOICE</a></strong></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <a href="files/ordercheck.php"><img src="assets/img/banner/ac3.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h6 class="font-15 style1">&nbsp;</h6>
                          <h2 class="mb-3 font-16"><strong><a href="files/confirmtrading.php">TRADING CONFIRMATION</a></strong></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <a href="files/confirmtrading.php"><img src="assets/img/banner/ac4.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

          </div>
          
          <div class="row ">       
                         
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h6 class="font-15 style1">&nbsp;</h6>
                          <h2 class="mb-3 font-16"><strong><a href="files/aconfirmorder.php">ORDER CONFIRMATION</a></strong></h2>
                     
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <a href="files/aconfirmorder.php"><img src="assets/img/banner/ac5.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
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
          <a href="#">POWERED BY EITC APPS</a></a>
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
<script>

function fetchDataAndPopulateCombinedChart() {
    fetch('iechart_data.php') // Change to the actual URL for fetching combined data
        .then(response => response.json())
        .then(data => {
            if (data && data.months && data.income_amounts && data.expense_amounts) {
                populateCombinedChart(data);
            } else {
                console.error('Data format is incorrect.');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}


function populateCombinedChart(data) {
    const combinedCtx = document.getElementById('combinedChart').getContext('2d');
    const combinedChart = new Chart(combinedCtx, {
        type: 'bar',
        data: {
            labels: data.months,
            datasets: [{
                label: 'Income Amount',
                data: data.income_amounts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Green color for income
            }, {
                label: 'Expense Amount',
                data: data.expense_amounts,
                backgroundColor: 'rgba(255, 99, 132, 0.6)', // Red color for expense
            }]
        },
        options: {}
    });
}

fetchDataAndPopulateCombinedChart();


</script>