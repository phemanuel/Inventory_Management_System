<?php
include "dbconfig.php";

$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$username = $_SESSION['user_name'];
$username1 = strtoupper($username);
$user_email = $_SESSION['user_email'];



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
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.png' />
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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $username1 ;  ?></div>
              <a href="../dashboarduser1.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> user Menu
              </a> 
              
              <div class="dropdown-divider"></div>
<a href="../usersetting.php" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> User Settings
              </a> 
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="../assets/img/logo1.png" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="../dashboardcheck1.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>STAFF PERFORMANCE REVIEW</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT user_id,user_name FROM user_details WHERE clientid='$clientid' and user_status = 'Active'  order by user_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>STAFF NAME</th><th>ACTION</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["user_name"]. "</td><td>"."<a class='btn btn-primary btn-action mr-1'data-toggle='tooltip' title='Performance Review' href='performancedashboard1.php?id=". $row["user_id"]."'>"."<i class='fas fa-pencil-alt'></i></a></td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
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
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>