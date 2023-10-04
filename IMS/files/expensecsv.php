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
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body>
<div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
<form id="form1" name="form1" method="post" action="expensecsvcheck.php">
  <table width="60%" border="0" align="left" class="table table-bordered table-striped">
  <tr>
      <td colspan="3"><span class="style1">Export All</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="12%"><span class="style4">Year</span></td>
      <td width="15%"><select name="year1" id="year1" class="form-control">
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
      </select>      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="24"><span class="style4">Month</span></td>
      <td><select name="month1" id="month1" class="form-control">
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
      </select>      </td>
      <td>&nbsp;</td>
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><span class="style1">Export by Department</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><span class="form-group">
        <select name="dept" id="dept" class="form-control" >
          <?php 
          session_start();
          $clientid = $_SESSION['clientid'] ;
									require "dbconfig.php";
									echo '<option value="">'.'--- Select Department ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT deptname FROM deptsetup where deptstatus = 'Active' and clientid = '$clientid' order by deptname asc");
$query_display = mysqli_query($conn,"SELECT * FROM deptsetup");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['deptname']."'>".$row['deptname']
 .'</option>';
}?>
        </select>
      </span></td>
      <td width="73%">&nbsp;</td>
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
       <td colspan="3"><input name="button" type="submit" id="button" onclick="MM_goToURL('parent','expense.php');return document.MM_returnValue" value="Close" /></td>
     </tr>
  </table>
</form>
</div>
</div>
</body>
</html>
