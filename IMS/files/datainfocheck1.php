<?php
include ("dbconfig.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    if (isset($_POST['submit1'])) {
        // transaction by all users
		$transname= $_REQUEST['transname'];
$transtype = $_REQUEST['transtype'];

$_SESSION['transname'] = $transname;
$_SESSION['transtype'] = $transtype;


		echo "<script>
window.location.href='datainforeportall.php';
</script>";
}
     else if (isset($_POST['submit2'])) {
       // transaction by users
		$transname= $_REQUEST['transname1'];
$transtype = $_REQUEST['transtype1'];

$_SESSION['transname'] = $transname;
$_SESSION['transtype'] = $transtype;


		echo "<script>
window.location.href='datainforeportuser.php';
</script>";
}
    
    
}
    

?>
