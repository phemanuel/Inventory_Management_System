<?php

include('dbconfig.php') ;

$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$mobileno = $_SESSION['mobileno'] ;
$customername  = $_REQUEST['customername'] ;
 $emailaddy  = $_REQUEST['emailaddy'] ;
 $gender  = $_REQUEST['gender'] ;
 $birthmonth  = $_REQUEST['birthmonth'] ;
 $birthday  = $_REQUEST['birthday'] ;
 $savetype = $_SESSION['savetype'] ;
 //=======================================
 $_SESSION['customername'] = $customername ;
 $_SESSION['itemsupplier'] = $customername ;
 $_SESSION['emailaddy'] = $emailaddy ;


if ($savetype == 1){

goto a ;
}
else if ($savetype == 2){

goto b ;
}
exit;
 //===========update for discount-====================
a:

$sql="INSERT INTO customer (customername,mobileno,emailaddy,gender,birthday,birthmonth,confirmby,clientid,status)
VALUES
('$customername','$mobileno', '$emailaddy','$gender','$birthday','$birthmonth','$user_name','$clientid','Active')";

if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}
                echo "<script>
window.location.href='discountlogincheck.php';
</script>";
            

exit ;

b:
 //===========update for discount-====================

$sql1="INSERT INTO customer (customername,mobileno,emailaddy,gender,birthday,birthmonth,confirmby,clientid,status)
VALUES
('$customername','$mobileno', '$emailaddy','$gender','$birthday','$birthmonth','$user_name','$clientid','Active')";
if (!mysqli_query($conn,$sql1))
{
die('error:' . mysqli_error());
}
                echo "<script>
window.location.href='saveitem.php';
</script>";
            

?>