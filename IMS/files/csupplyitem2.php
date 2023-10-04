<?php
include ("dbconfig.php");


$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$itemid = $_SESSION['product_id'] ;
$itemname = $_SESSION['itemname'];
$itembarcode = $_SESSION['itembarcode'] ;
$quantitykeep = $_SESSION['quantitykeep'];
$itemunit = $_SESSION['itemunit'] ;
$itembaseprice = $_SESSION['itembaseprice'] ;
$itemprice = $_SESSION['itemprice'] ;
$producttype = $_SESSION['producttype'] ;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
<!--
.style5 {font-size: 12px}
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
<form method="post" id="product_form" action="additem1.php">
  <table width="352" border="0">
    <tr>
      <td><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add Item</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Item Barcode : </label>
            <span class="style5"><?php echo $itembarcode; ?></span></div>
          <div class="form-group">
            <label>Item Name : </label> <?php echo $itemname; ?>
          </div>
          <div class="form-group">
            <label>Item Unit : </label> <?php echo $itemunit; ?>
          </div>
          <div class="form-group">
            <label>Item Price : </label> <?php echo $itemprice; ?>
          </div>
          
          <div class="form-group">
            <label>Quantity</label>
            <input name="itemquantity" type="text" class="form-control" id="itemquantity" size="10" required="required" />
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','cporder.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
