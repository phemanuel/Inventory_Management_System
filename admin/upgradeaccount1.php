<?php

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
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="upgradeaccount.php">
  <table width="668" border="0">
    <tr>
      <td width="545"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> ADMIN </h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
           <div class="form-group">
            <label>Client Request<br />
            <br />
            </label><p>
              <?php
include "dbconfig.php" ; 

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT id,clientname,currentplan, upgradeplan, clientsub, clientprice,cplanduedate,upgradestatus FROM accountupgrade   order by clientname ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo "<table width = '100%' border = '1' class='table table-bordered table-striped table-condensed'><thead><tr><th>S/NO</th><th>CLIENT NAME</th><th>CURRENT PLAN</th><th>UPGRADE PLAN</th><th>SUBSCRIPTION</th><th>DUE DATE</th><th>TOTAL PAYMENT</th><th>STATUS</th><th>ACTIONS</th></tr></thead>";
     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["clientname"]. "</td><td>" . $row["currentplan"]. "</td><td>"  . $row["upgradeplan"]. "</td><td>"  . $row["clientsub"]. "</td><td>" . $row["cplanduedate"]. "</td><td>" . $row["clientprice"]. "</td><td>" . $row["upgradestatus"]. "</td><td>"."<a href='upgradeaccount.php?id=". $row["id"]."'>"."Upgrade"."</a></td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "Acceptance fee has not been paid.";
}
?>
            </p>
            </div>
          </div>
         <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-info" value="Proceed" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','adminpage.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="42">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

