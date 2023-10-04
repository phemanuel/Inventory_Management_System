<?php
include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS :: </title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#startdate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
    <script>
	$(document).ready(function(){
		$('#enddate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
    <style type="text/css">
<!--
.style8 {color: #660033}
-->
    </style>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="staffaccesssave.php">
  <table width="100%" border="0">
    <tr>
      <td width="322"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Staff Access</h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
           <div class="form-group">
            <label>Staff Name</label><p>
              <select name="applicantname" id="applicantname" class="form-control" required>
                                    <?php 
									require "dbconfig.php";
									echo '<option value="">'.'--- Select Staff Name ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT applicantname FROM recruitment where clientid = '$clientid' and status = 'Active' order by applicantname asc");
$query_display = mysqli_query($conn,"SELECT * FROM recruitment");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['applicantname']."'>".$row['applicantname']
 .'</option>';
}?>
                                </select>
            </p>
            
           </div>
           <div class="form-group">
            <label>Department</label><p>
              <select name="dept" id="dept" class="form-control" required>
                                    <?php 
									require "dbconfig.php";
									echo '<option value="">'.'--- Select Department ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT deptname FROM deptsetup where clientid = '$clientid' and deptstatus = 'Active' order by deptname asc");
$query_display = mysqli_query($conn,"SELECT * FROM deptsetup");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['deptname']."'>".$row['deptname']
 .'</option>';
}?>
                                </select>
            </p>
            
           </div>
           
           <div class="form-group">
                                <label>User Level</label>
                                <select name="user_type" id="user_type" class="form-control" required>
                                   
    <option selected>master</option>
    <option>user</option> 
                                </select>
                            </div>
						<div class="form-group">
							<label>User ID</label>
							<input type="text" name="user_email" id="user_email" class="form-control" required />
						</div>
						<div class="form-group">
							<label>User Password</label>
							<input type="password" name="user_password" id="user_password" class="form-control" required />
						</div>
                        <div class="form-group">
							<label>== Grant Access ==</label><br/>
							
						</div>
                         <div class="form-group">
                                <label>Admin Management</label>
                                <select name="checkbox1" id="checkbox1" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Account Management</label>
                                <select name="checkbox2" id="checkbox2" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Product Management</label>
                                <select name="checkbox3" id="checkbox3" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Purchase</label>
                                <select name="checkbox4" id="checkbox4" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Sales</label>
                                <select name="checkbox8" id="checkbox8" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Customer Management</label>
                                <select name="checkbox5" id="checkbox5" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>HR Management</label>
                                <select name="checkbox6" id="checkbox6" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Report Management</label>
                                <select name="checkbox7" id="checkbox7" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trading</label>
                                <select name="checkbox9" id="checkbox9" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trading Report</label>
                                <select name="checkbox11" id="checkbox11" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Delivery</label>
                                <select name="checkbox10" id="checkbox10" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <select name="checkbox12" id="checkbox12" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rebate</label>
                                <select name="checkbox13" id="checkbox13" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Delete Transaction</label>
                                <select name="checkbox14" id="checkbox14" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
         </div>
         <div class="modal-footer">
          <input type="submit" name="submit1" id="submit1" class="btn btn-info" value="Submit" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','../dashboardcheck.php');return document.MM_returnValue" value="Close" />
        </div>
        
        </div></td>
      <td width="751">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

