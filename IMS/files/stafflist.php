<?php
include('database_connection.php');
include('function.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
.style1 {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
}
.style4 {font-family: Calibri; font-size: 16px; }
-->
</style>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
</head>

<body>
<div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
<form id="form1" name="form1" method="post" action="stafflistcheck.php">
  <table width="60%" border="0" align="left" class="table table-bordered table-striped">
    <tr>
      <td colspan="3"><span class="style1">Export  ALL</span></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td><select name="select" id="select" class="form-control">
        <option>ALL</option>
      </select></td>
      <td>&nbsp;</td>
     </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" name="button1" id="button1" value="Process" /></td>
    </tr>
     
     <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><span class="style1">Export by Dept</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="9%"><span class="style4">Dept</span></td>
      <td width="18%"><span class="form-group">
        <select name="dept" id="dept" class="form-control" >
          <option value="">Select Department</option>
          <?php echo fill_dept_list($connect);?>
        </select>
      </span></td>
      <td width="73%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="button2" id="button2" value="Process" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</div>
</div>
</body>
</html>
