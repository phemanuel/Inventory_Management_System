<?php
//session_start();
require "dbconfig.php";// Database connection
$appabbrv = $_REQUEST['apptype'];
$_SESSION['appabbrv'] = $appabbrv;

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
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
    <style type="text/css">
<!--
.style5 {font-size: 16px}
-->
    </style>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="acctactivate2.php">
  <table width="597" border="0">
    <tr>
      <td width="322"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> ADMIN</h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
          <div class="form-group">
            <p>Account Name</p>
            <p><span class="style5">
              <?php

//////////////////////////////
echo "<select name= 'clientname' class='form-control'>";
echo '<option value="">'.'--- Select Account Name ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT clientname FROM clientreg where appabbrv = '$appabbrv' order by clientname asc");
$query_display = mysqli_query($conn,"SELECT * FROM clientreg");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['clientname']."'>".$row['clientname']
 .'</option>';
}
echo '</select>';
?></span></p>
            </div>
          </div>
         <div class="modal-footer">
           <input type="submit" name="action" id="action" class="btn btn-info" value="Proceed" />
           <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Close" />
         </div>
      </div></td>
      <td width="265">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

