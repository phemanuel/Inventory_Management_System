<?php
//session_start();
include ("dbconfig.php") ; 
$clientname = $_REQUEST['clientname'];
$appabbrv = $_SESSION['appabbrv'];

$sql="SELECT * FROM clientreg WHERE clientname='$clientname' and appabbrv='$appabbrv' ";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

$clientid = $rowval['clientid'];
$clientstatus = $rowval['clientstatus'];
$clientplan = $rowval['clientplan'];
$clienttype = $rowval['clienttype'];
$clientsize = $rowval['clientsize'];
$clientlogo = $rowval['clientlogo'];
$clientlogo = $rowval['clientlogo'];
$startdate = date ('d-m-Y') ;

$_SESSION['clientid'] = $clientid;
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EITC ::</title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#duedate').datepicker({
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
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="acctactivate3.php">
  <table width="597" border="0">
    <tr>
      <td width="354"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> ADMIN</h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
          <div class="form-group">
            <p><strong>App Type</strong> : </p>
            <p>Account Name : <?php  echo $clientname ;  ?></p>
            <p>Account ID : <?php  echo $clientid ;  ?></p>
            <p>Account Plan : <?php  echo $clientplan . " Month/s" ;  ?></p>
            <p>Account Type : <?php  echo $clienttype ;  ?></p>
            <p>Date Activated : <?php  echo $startdate ;  ?></p>
            <p><strong>Due Date </strong></p>
            <input type="text" name="duedate" id="duedate" class="form-control" value="" required="required" />
            <p>&nbsp;</p>
            </div>
          </div>
         <div class="modal-footer">
           <input type="submit" name="action" id="action" class="btn btn-info" value="Activate" />
           <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Close" />
         </div>
      </div></td>
      <td width="233">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

