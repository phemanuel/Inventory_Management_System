

<?php
include ("dbconfig.php");

$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];

$mobileno = $_SESSION['mobileno'];

$discount = $_SESSION['discount'];

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
<title>IMS :: Order</title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
<!--
.style8 {
	font-family: Calibri;
	font-size: 14px;
}
-->
</style>
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
<div class="row"></div>
<form method="post" id="product_form" action="updatecusinfo1.php">
  <table width="597" border="0">
    <tr>
      <td width="399"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Update Customer Details</h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
          <div class="form-group">
            <label>Mobile No</label>
            <p><?php echo $mobileno ; ?></p>
           
          </div>
          <div class="form-group">
            <label>Full Name</label><p>
              <input name="customername"  type="text" class="form-control" id="customername" size="10" autofocus  required />
            </p>
            
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <p>
              <input name="emailaddy"  type="text" class="form-control" id="emailaddy" value="user@usern.ng" size="10" autofocus  required />
            </p>
            
          </div>
          <div class="form-group">
            <label>Gender</label>
            <p>
              <select name="gender" id="gender" class="form-control">
                <option selected="selected">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                                          </select>
            </p>
            
          </div>
           <div class="form-group">
            <label>Month</label>
            <p>
              <select name="birthmonth" id="birthmonth" class="form-control">
                <option selected="selected">Select Month</option>
                <option>JANUARY</option>
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
                                          </select></p>
          </div>
          <div class="form-group">
            <label>Day</label>
            <p>
              <select name="birthday" id="birthday" class="form-control">
                <option>Select Day</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
                                                        </select>
            </p>
            
          </div>
          
        <div class="modal-footer">
        <input name="button" type="submit" id="button"  class="btn btn-info"  value="Update &amp; Continue" />
        <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','../dashboardcheck.php');return document.MM_returnValue" value="Close" />
        </div>
         </div>
         </div>
      
        
      </td>
      <td width="188">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

