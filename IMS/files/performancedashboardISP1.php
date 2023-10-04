<?php
include "dbconfig.php";
$staff_id = $_GET['id'];

$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$username = $_SESSION['user_name'];
$username1 = strtoupper($username);
$user_email = $_SESSION['user_email'];

//====GET ID=====


$sql1="SELECT * FROM user_details WHERE user_id='$staff_id' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
while($rowval = mysqli_fetch_array($result1))
 {

$staff_name = $rowval['user_name'];
$_SESSION['staff_name']= $staff_name;

}
}
else {
    
}


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
                    <h4>STAFF PERFORMANCE REVIEW FOR <?php echo $staff_name ;  ?> </h4>
                  </div>
                  <div class="card-header">
                    <h4>Query by Date</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-inline" action="performancedashboarddateISP.php">
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
                </div>
            </div> 
            
            <div class="row">
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Orders</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT user_id,supplyid,totalquantity,totalamount,supplydate FROM supply1 WHERE confirmby = '$staff_name' and clientid='$clientid' and transstatus = 'Active'  order by supplydate DESC LIMIT 5";
$result = $conn->query($sql);
//=============================
$sql3="SELECT * FROM supply1 WHERE confirmby = '$staff_name' and clientid='$clientid' and transstatus = 'Active'";
$result3=mysqli_query($conn,$sql3);

// Mysql_num_row is counting table row
$count3=mysqli_num_rows($result3);
//========================

if ($result->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>ITEM ID</th><th>TOTAL QTY</th><th>TOTAL AMOUNT</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["supplyid"]. "</td><td>" . $row["totalquantity"]. "</td><td>" . $row["totalamount"]. "</td><td>" . $row["supplydate"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction/s : $count3 </a></strong><br>";
     echo  "<a href='#'>For more information check the sales report</a>";
	
} else {
     echo "Staff has made 0 transaction";
}
?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                 <div class="card">
                  <div class="card-header">
                    <h4>Trading</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql4 = "SELECT product_id,tradeid,card_name,customer_name,date1 FROM trading WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'  order by date1 DESC LIMIT 4";
$result4 = $conn->query($sql4);
//=============================
$sql5="SELECT * FROM trading WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'";
$result5=mysqli_query($conn,$sql5);

// Mysql_num_row is counting table row
$count5=mysqli_num_rows($result5);
//========================

if ($result4->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>CARD NAME</th><th>CUSTOMER NAME</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result4->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["card_name"]. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["date1"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction/s : $count5 </a></strong><br>";
     echo  "<a href='#'>For more information check the Trading report</a>";
	
} else {
     echo "Staff has made 0 transaction";
}
?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Delivery</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql6 = "SELECT product_id,customer_name,item_name,date1 FROM delivery WHERE confirm_by = '$staff_name' and clientid='$clientid'   order by date1 DESC LIMIT 4";
$result6 = $conn->query($sql6);
//=============================
$sql7="SELECT * FROM delivery WHERE confirm_by = '$staff_name' and clientid='$clientid'";
$result7=mysqli_query($conn,$sql7);

// Mysql_num_row is counting table row
$count7=mysqli_num_rows($result7);
//========================

if ($result6->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>CUSTOMER NAME</th><th>ITEM NAME</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result6->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["item_name"]. "</td><td>" . $row["date1"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction/s : $count7 </a></strong><br>";
     echo  "<a href='#'>For more information check the Delivery report</a>";
	
} else {
     echo "Staff has made 0 transaction";
}
?>
                  </div>
                </div>
              </div>
              
              <div class="row">
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Expense</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql8 = "SELECT pid,itemname,dept,purchasedate FROM purchase1 WHERE confirmby = '$staff_name' and clientid='$clientid' and status = 'Active'  order by purchasedate DESC LIMIT 4";
$result8 = $conn->query($sql8);
//=============================
$sql9="SELECT * FROM purchase1 WHERE confirmby = '$staff_name' and clientid='$clientid' and status = 'Active'";
$result9=mysqli_query($conn,$sql9);

// Mysql_num_row is counting table row
$count9=mysqli_num_rows($result9);
//========================

if ($result8->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>ITEM NAME</th><th>DEPT</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result8->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["itemname"]. "</td><td>" . $row["dept"]. "</td><td>" . $row["purchasedate"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction/s : $count9 </a></strong><br>";
     echo  "<a href='#'>For more information check the Expense report</a>";
	
} else {
     echo "Staff has made 0 transaction";
}
?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                 <div class="card">
                  <div class="card-header">
                    <h4>Enterprise(Data)</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql10 = "SELECT product_id,customer_name,network_type,date1 FROM datainfo1 WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'  order by date1 DESC LIMIT 5";
$result10 = $conn->query($sql10);
//=============================
$sql11="SELECT * FROM datainfo1 WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'";
$result11=mysqli_query($conn,$sql11);

// Mysql_num_row is counting table row
$count11=mysqli_num_rows($result11);
//========================

if ($result10->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>CUSTOMER NAME</th><th>NETWORK</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result10->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["network_type"]. "</td><td>" . $row["date1"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction : $count11 </a></strong><br>";
     echo  "<a href='#'>For more information check the Enterprise(Data report)</a>";
	
} else {
     echo "Staff has made 0 transaction";
}
?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Enterprise(Airtime)</h4>
                  </div>
                  <div class="card-body">
                    <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql12 = "SELECT product_id,customer_name,network_type,date1 FROM airtime_info WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'  order by date1 DESC LIMIT 5";
$result12 = $conn->query($sql12);
//=============================
$sql13="SELECT * FROM airtime_info WHERE confirm_by = '$staff_name' and clientid='$clientid' and status = 'Active'";
$result13=mysqli_query($conn,$sql13);

// Mysql_num_row is counting table row
$count13=mysqli_num_rows($result13);
//========================

if ($result12->num_rows > 0) {


echo "<table class='table table-striped'><thead><tr><th>S/NO</th><th>CUSTOMER NAME</th><th>NETWORK</th><th>DATE</th></thead>";


     // output data of each row
	 $c=0;
     while($row = $result12->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["network_type"]. "</td><td>" . $row["date1"]. "</td></tr>";
	
     }
     
     echo "</table>";
     echo  "<strong><a href='#'>Total Transaction : $count13 </a></strong><br>";
     echo  "<a href='#'>For more information check the Enterprise(airtime) report</a>";
	
} else {
     echo "Staff has made 0 transaction";
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