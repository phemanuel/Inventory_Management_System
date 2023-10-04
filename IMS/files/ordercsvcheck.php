<?php
include ("dbconfig.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['button1'])) {
        // process by dept
		$yearkeep = $_REQUEST['year2'] ; 
		$_SESSION['yearkeep'] = $yearkeep ; 
		echo "<script>
window.location.href='orderbyyear.php';
</script>";
}
     else if (isset($_POST['button2'])) {
        //process by matric no
		$month1 = $_REQUEST['month1'] ;
		$year1 = $_REQUEST['year1'] ;  
		$_SESSION['month1'] = $month1 ; 
		$_SESSION['year1'] = $year1 ; 
		
		echo "<script>

window.location.href='orderbymonth.php';
</script>";
}
    
    else if (isset($_POST['button3'])) {
        //process by matric no
		$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];
$_SESSION['startdate'] = $startdate;
$_SESSION['enddate'] = $enddate;
		
		echo "<script>

window.location.href='orderbydate.php';
</script>";
}
}
mysqli_close($conn);
//echo ("Information has been submitted");



	

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
