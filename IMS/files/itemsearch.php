

<?php
include ("dbconfig.php");

$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$supplyid = $_SESSION['supplyid'];
//$customername = $_SESSION['customer_namekeep'];
//$mobileno = $_SESSION['mobileno'];
//$emailaddy = $_SESSION['emailaddy'];
//$commentkeep = $customername;
//$_SESSION['comment'] = $commentkeep ;
$discount = $_SESSION['discount'];

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 



$sql1="SELECT * FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);

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
.style9 {
	font-family: Calibri;
	color: #000000;
	font-weight: bold;
	font-size: 20px;
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
<form method="post" id="product_form" action="supplyitemsearch.php">
  <table width="597" border="0">
    <tr>
      <td width="399"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> <strong>Create Order</strong></h4>
        </div>
         <div class="modal-body"><a href="checkout.php"><img src="images/cart.png" width="49" height="46" /><span class="style9"> <?php  echo $count ; ?></span></a></div>
         <div class="modal-body">
          <div class="form-group">
            <label>Barcode</label><p>
              <input name="barcode" onmouseover="this.focus();" type="text" class="form-control" id="barcode" size="10" autofocus  required />
            </p>
            <p>&nbsp;              </p>
          </div>
          
        <div class="modal-footer">
        <input name="button" type="submit" id="button"  class="btn btn-info"  value="Add to cart" />
        <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','checkout.php');return document.MM_returnValue" value="View Cart" />
        <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','../dashboardcheck1.php');return document.MM_returnValue" value="Close" />
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Search by item Name</label>
            <p><span class="modal-footer">
              <input name="button2" type="submit" id="button2"  class="btn btn-info" onclick="MM_goToURL('parent','supply.php');return document.MM_returnValue" value="View all items" />
            </span></p>
            <p>&nbsp;              </p>
          </div>
          </div>
        
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

