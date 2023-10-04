<?php
session_start() ;

//$session1keep = $_SESSION['session1keep'] ;
//$coursekeep = $_SESSION['coursekeep'] ;
$clientid = $_REQUEST['clientid'] ;
$conn = mysqli_connect("localhost", "eitccomn_eitcuser", "eitccon231027", "eitccomn_ims");
//============check for duplicate=====================

//--------------------------------------upload------------
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into product (product_barcode,category_name,product_name,product_description,product_quantity,product_unit,shelf,product_base_price,product_sell_price,product_enter_by,product_type,product_status,product_date,clientid,user_id,product_discount)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "','" . $column[15] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>

<style>
body {
	font-family: Arial;
	width: 550px;
}

.outer-scontainer {
	border: 1px solid #FFFFFF;
	padding: 20px;
	border-radius: 2px;
	width: 100%;
	background-color: #FFFFFF;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

.outer-scontainer table {
	border-collapse: collapse;
	width: 100%;
}

.outer-scontainer th {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.outer-scontainer td {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>

 <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
   <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
<style type="text/css">
<!--
.btn-submit1 {	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}
.outer-scontainer1 {	border: 1px solid #FFFFFF;
	padding: 20px;
	border-radius: 2px;
	width: 100%;
	background-color: #FFFFFF;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style2 {
	font-size: 14px;
	font-style: italic;
}
-->
</style>
</head>

<body>
    <table width="100%" border="0" cellpadding="4" cellspacing="4" class="table table-bordered table-striped table-condensed">
      <tr>
        <td><p class="style1">File Format : csv</p>
          <p class="style1 style2">Note: Do not refresh the page. |<a href="uploadproduct.php">Back to Upload Menu</a></p>
          <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
          <div class="outer-scontainer1">
            <div class="row">
              <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                  <label class="col-md-4 control-label">Choose CSV
                    File to upload</label>
                  <input type="file" name="file"
                        id="file" accept=".csv">
                  <button type="submit" id="submit" name="import"
                        class="btn-submit1">Import</button>
                  <br />
                </div>
              </form>
            </div>
            <?php
            $sqlSelect = "SELECT * FROM product WHERE clientid = '$clientid' ";
            $result = mysqli_query($conn, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
            <table width="100%" id='userTable' class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>Product Barcode</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Base Price</th>
                  <th>Sell Price</th>
                   <th>Enter by</th>
                    <th>Product Type</th>
                </tr>
              </thead>
              <?php
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
              <tbody>
                <tr>
                  <td><?php  echo $row['product_barcode']; ?></td>
                  <td><?php  echo $row['product_name']; ?></td>
                  <td><?php  echo $row['product_quantity']; ?></td>
                  <td><?php  echo $row['product_base_price']; ?></td>
                  <td><?php  echo $row['product_sell_price']; ?></td>
                  <td><?php  echo $row['product_enter_by']; ?></td>
                  <td><?php  echo $row['product_type']; ?></td>
                  
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <?php } ?>
          </div>          
        <p><a href="uploadcoursedata.php">Back to Upload Menu</a></p></td>
      </tr>
    </table>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"></div>
</body>
<!-- js placed at the end of the document so the pages load faster -->
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="../lib/jquery.scrollTo.min.js"></script>
<script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
<script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
<script src="../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
<script src="../lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
<script src="../lib/jquery.tagsinput.js"></script>

  <!--Contactform Validation-->
<script src="../lib/php-mail-form/validate.js"></script>
<script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../lib/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../lib/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="../lib/advanced-form-components.js"></script>
</html>
