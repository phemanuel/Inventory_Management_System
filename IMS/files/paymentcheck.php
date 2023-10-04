<?php
include ("dbconfig.php");


$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];

if ( empty ( $_REQUEST['paymentstatus'])) {
echo "<script>
alert('Select the payment status.');
window.location.href='checkout1.php';
</script>";
}
else if ( empty ( $_REQUEST['mobileno'])) {
echo "<script>
alert('Enter the customer mobile no.');
window.location.href='checkout1.php';
</script>";
}

else {
goto f ;
}

exit ;


f:


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['submit1'])) {
        // process by dept
		//$itemsupplier = $_REQUEST['itemsupplier'];
		
$mobileno = $_REQUEST['mobileno'];
$paymentmode = $_REQUEST['paymentmode'];
$status = $_REQUEST['paymentstatus'];
$refcode = $_REQUEST['refcode'];

$_SESSION['refcode'] = $refcode;
$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['status'] = $status;
$_SESSION['mobileno'] = $mobileno;

goto g ;
		
}
     else if (isset($_POST['submit2'])) {
        //process by matric no
		
$mobileno = $_REQUEST['mobileno'];
$emailaddy = "Nill";
$paymentmode = $_REQUEST['paymentmode'];
$status = $_REQUEST['paymentstatus'];
$refcode = $_REQUEST['refcode'];

$_SESSION['refcode'] = $refcode;

$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['status'] = $status;
$_SESSION['mobileno'] = $mobileno;
$_SESSION['finalamount'] = $_SESSION['totalamount'];

goto h ;
		
}
    
    
}
    
    exit ;

    g:
    //-------check mobile no if available---------discount
    $_SESSION['savetype'] = 1 ;
$sql="SELECT * FROM customer WHERE mobileno='$mobileno' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

  
$_SESSION['customername'] = $rowval['customername'];
$_SESSION['emailaddy'] = $rowval['emailaddy'];
 $_SESSION['itemsupplier'] = $rowval['customername'];
echo "<script>
window.location.href='discountlogincheck.php';
</script>";
}

}
else {
echo "<script>
alert ('Update the customer details before checking out.');
window.location.href='updatecusinfo.php';
</script>";

}

exit ;

h:
//-------check mobile no if available--------- no discount
$_SESSION['savetype'] = 2 ;
$sql1="SELECT * FROM customer WHERE mobileno='$mobileno' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
while($rowval = mysqli_fetch_array($result1))
 {

  
$_SESSION['customername'] = $rowval['customername'];
$_SESSION['emailaddy'] = $rowval['emailaddy'];
$_SESSION['itemsupplier'] = $rowval['customername'];
 echo "<script>
window.location.href='saveitem.php';
</script>";

}

}
else {
echo "<script>
alert ('Update the customer details before checking out.');
window.location.href='updatecusinfo.php';
</script>";

}



?>