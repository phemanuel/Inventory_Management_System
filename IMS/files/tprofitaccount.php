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
<form method="post" id="product_form" action="tprofitaccountcheck.php">
  <table width="100%" border="0">
    <tr>
      <td width="322"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Profit Analysis</h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
           <div class="form-group">
            <label><span class="style8">All Transactions</span></label>
           </div>
          <div class="form-group">
            <label>User Name</label><p>
              <select name="transname" id="transname" class="form-control">
                <option selected="selected">ALL</option>
              </select>
            </p>
            <label></label><p>
              <select name="transtype" id="transtype" class="form-control">
                <option selected="selected">Daily</option>
                <option>Date Range</option>
                
              </select>
            </p>
            <p>&nbsp;</p>
          </div>
          </div>
         <div class="modal-footer">
          <input type="submit" name="submit1" id="submit1" class="btn btn-info" value="Process" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','trading.php');return document.MM_returnValue" value="Close" />
        </div>
        
        <div class="modal-body">
        <div class="form-group">
            <label><span class="style8">Transactions by User</span></label>
           </div>
           <div class="form-group">
            <label>User Name</label>
            <p>
              <?php
// Database connection
//////////////////////////////
echo "<select name= 'transname1' class='form-control'>";
echo '<option value="">'.''.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT user_name FROM user_details WHERE user_status = 'Active' and clientid='$clientid' order by user_name asc");
$query_display = mysqli_query($conn,"SELECT * FROM user_details");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['user_name']."'>".$row['user_name']
 .'</option>';
}
echo '</select>';
?>
            </p>
            <label></label><p>
              <select name="transtype1" id="transtype1" class="form-control">
                <option selected="selected">Daily</option>
                <option>Date Range</option>
               
              </select>
            </p>
            <p>&nbsp;</p>
          </div>
          </div>
         <div class="modal-footer">
          <input type="submit" name="submit2" id="submit2" class="btn btn-info" value="Process" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','trading.php');return document.MM_returnValue" value="Close" />
        </div>
        
      </div></td>
      <td width="751">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

