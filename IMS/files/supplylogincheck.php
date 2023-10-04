<?php
include ("dbconfig.php");

if ( isset( $_POST [ 'submit' ])){
if ( empty ( $_POST [ "mobileno" ])) {
//without mobile no
$mobileno= "08138655011";
$_SESSION['mobileno'] = $mobileno ;
$_SESSION['searchme'] = 1 ;
echo "<script>

window.location.href='supplylogin1.php';
</script>";

} 

else {
//with mobile no

$mobileno=$_REQUEST['mobileno'];
$_SESSION['mobileno'] = $mobileno ;
$_SESSION['searchme'] = 2 ;

echo "<script>

window.location.href='supplylogin1.php';
</script>";

} 

}


?>
