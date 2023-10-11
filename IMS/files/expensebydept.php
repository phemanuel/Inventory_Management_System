
<?php
include "dbconfig.php" ; 

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 

$deptkeep = $_SESSION['dept'];
$clientid = $_SESSION['clientid'];

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
-->
</style>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #ffffff;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}

</style>
<style type="text/css">
<!--
.style2 {font-family: Calibri;
	font-size: 15px;
}
.style5 {font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #000000;
}
.style6 {color: #FF0000}
.style7 {color: #000000}
-->
</style>
</head>

<body>
<div class="panel-body">
                        <div class="row">
                          <table width="974" border="0" align="center" cellpadding="3" cellspacing="3">
                            <tr>
                              <td width="36">&nbsp;</td>
                              <td width="779"><div class="col-sm-12 table-responsive">
                                <form id="form1" name="form1" method="post" action="">
                                  <table width="60%" border="0" align="left" class="table table-bordered table-striped">
                                    <tr>
                                      <td><span class="style1"><a href="expensecsv1.php">Download CSV</a> for Expense made by <span class="style6"><?php echo $deptkeep;  ?> <span class="style7">| <a href="expense.php">Menu</a></span></span></span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td><span class="style2">
                                        <?php
        // variable to store number of rows per page

        $limit = 20;    

        // update the active page number

         if (isset($_GET["page"])) {    

            $page_number  = $_GET["page"];    

        }    

        else {    

        $page_number=1;    

        }       
        // get the initial page number

         $initial_page = ($page_number-1) * $limit;  

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT itemname,amount,purchasedate,paymentmode,expensename,approvedby FROM purchase1 
WHERE  dept='$deptkeep' and clientid='$clientid'  order by purchasedate DESC LIMIT $initial_page, $limit";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM purchase1 WHERE  dept='$deptkeep' and clientid='$clientid' LIMIT $initial_page, $limit";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
$_SESSION['totalrecord'] = $count ;
//====================
if ($result->num_rows > 0) {


echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>EXPENSE NAME</th><th>ITEM NAME</th><th>AMOUNT</th><th>APPROVED BY</th><th>PAYMENT MODE</th><th>DATE</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["expensename"]. "</td><td>" . $row["itemname"]. "</td><td>"  . $row["amount"]. "</td><td>"  . $row["approvedby"]. "</td><td>"  . $row["paymentmode"]. "</td><td>"  . $row["purchasedate"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="style5"><?php echo $count ;?>&nbsp; records</span></td>
                                    </tr>
                                  </table>
                                  <table width="50%" border="0" cellpadding="4" cellspacing="4" class='table table-bordered table-striped'>
                                    <tr>
                                      <td><strong>Pagination</strong></td>
                                    </tr>
                                    <tr>
                                      <td><ul>
                                          <?php  

$getQuery = "SELECT COUNT(*) FROM purchase1 
WHERE  dept='$deptkeep' and clientid='$clientid' ";     

$result = mysqli_query($conn, $getQuery);     

$row = mysqli_fetch_row($result);     

$total_rows = $row[0];              

echo "</br>";            

// get the required number of pages

$total_pages = ceil($total_rows / $limit);     

$pageURL = "";             

if($page_number>=2){   

    echo "<li class='Previous'><a href='expensebydept.php?page=".($page_number-1)."'>  <strong>Prev</strong> </a></li>";   

}                          

for ($i=1; $i<=$total_pages; $i++) {   

  if ($i == $page_number) {   

      $pageURL .= "<li><a class = 'active' href='expensebydept.php?page="  

                                        .$i."'>".$i." </a></li>";   

  }               

  else  {   

      $pageURL .= "<li><a href='expensebydept.php?page=".$i."'>   

                                        ".$i." </a></li>";     

  }   

};     

echo $pageURL;    

if($page_number<$total_pages){   

    echo "<li class='Next'><a href='expensebydept.php?page=".($page_number+1)."'>  <strong>Next</strong> </a></i></li>";   

}     

?>
                                      </ul></td>
                                    </tr>
                                  </table>
                                </form>
                              </div></td>
                              <td width="26">&nbsp;</td>
                            </tr>
                          </table>
                        </div>
</body>
</html>
