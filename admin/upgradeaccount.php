<?php
include ('dbconfig.php');
//===============get details from the db
$idkeep = $_GET['id'];
$sql="SELECT * FROM accountupgrade WHERE id='".$idkeep."'";
$result=mysqli_query($conn,$sql);


while($rowval = mysqli_fetch_array($result))
{
$clientname= $rowval['clientname'];
$currentplan = $rowval['currentplan'];
$upgradeplan= $rowval['upgradeplan'];
$duedate1 = $rowval['cplanduedate'];
$duedate = date("d-m-Y", strtotime($duedate1));  
$clientsub = $rowval['clientsub'];
$clientprice = $rowval['clientprice'];
$_SESSION['currentplan'] = $rowval['currentplan'];
$_SESSION['upgradeplan'] = $rowval['upgradeplan'];
$_SESSION['clientsub'] = $rowval['clientsub'];
$_SESSION['clientprice'] = $rowval['clientprice'];
//$_SESSION['cplanduedate'] = $rowval['duedate'];
//$picnamekeep= $rowval['picturename'];
 

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
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="upgradeaccount2.php">
  <table width="597" border="0">
    <tr>
      <td width="415"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> ADMIN </h4>
        </div>
         <div class="modal-body"></div>
         <div class="modal-body">
          <div class="form-group">
            <p><strong>Client Name : <?php  echo $clientname ; ?></strong></p>
            <p><strong>Current Plan : <?php  echo $currentplan ; ?></strong></p>
            <p><strong>Due Date :
                <?php  echo $duedate ; ?>
            </strong></p>
            <p><strong>Uprgraded Plan : <?php  echo $upgradeplan ; ?></strong></p>
            <p><strong>Subscription : 
                <?php  echo $clientsub ; ?>
            </strong></p>
            <p><strong>Total Payment Due : 
                <?php  echo $clientprice ; ?>
            </strong></p>
          </div>
          <div class="form-group">
            <label>Start Date</label>
            <p>
              <input type="text" name="startdate" id="startdate" class="form-control"/>
            </p>
            </div>
            <div class="form-group">
            <label>Due Date</label>
            <p>
              <input type="text" name="enddate" id="enddate" class="form-control"/>
            </p>
            </div>
          </div>
         <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-info" value="Upgrade Account" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','adminpage.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="172">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
