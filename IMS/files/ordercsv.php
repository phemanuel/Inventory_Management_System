<?php
session_start();
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];



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
.style12 {color: #FF0000; font-weight: bold; }
.style13 {color: #FF0000}
-->
    </style>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="ordercsvcheck.php">
  <table width="100%" border="0">
    <tr>
      <td width="273">&nbsp;</td>
      <td width="465"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i>Sales Report</h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-body">
          <div class="form-group">
            <label><span class="style13">EXPORT by Date</span><br />
            <br />
              Start Date</label>
            <p>
              <input name="startdate" type="text" class="form-control" id="startdate" size="10"  />
            </p>
            <p>&nbsp;</p>
          </div>
          <div class="form-group">
            <label>End Date</label>
            <p>
              <input name="enddate" type="text" class="form-control" id="enddate" size="10"  />
            </p>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="button3" id="button3" class="btn btn-info" value="Proceed" />
        </div>
        <div class="modal-body"></div>
        <div class="modal-body">
          <div class="form-group">
            <label>
            <span class="style12">EXPORT by Month</span><br />
            <br />
            <label>Year</label>
            <p>
              <select name="year1" id="year1" class="form-control">
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
                <option>2030</option>
              </select>
            </p>
          </div>
          <div class="form-group">
            <label>Month</label>
            <p>
              <select name="month1" id="month1" class="form-control">
                <option selected="selected">JANUARY</option>
                <option>FEBRUARY</option>
                <option>MARCH</option>
                <option>APRIL</option>
                <option>MAY</option>
                <option>JUNE</option>
                <option>JULY</option>
                <option>AUGUST</option>
                <option>SEPTEMBER</option>
                <option>OCTOBER</option>
                <option>NOVEMBER</option>
                <option>DECEMBER</option>
              </select>
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="button2" id="button2" class="btn btn-info" value="Proceed" />
        </div>
        <div class="modal-body"></div>
        <div class="modal-body">
          <div class="form-group">
            <label>
            <span class="style12">EXPORT All</span><br />
            <br />
            <label></label>
            <p>
              <label>Year</label>
            </p>
            <p>
              <select name="year2" id="year2" class="form-control">
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
                <option>2030</option>
              </select>
            </p>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="button1" id="button1" class="btn btn-info" value="Proceed" />
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','placcount.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="267">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

