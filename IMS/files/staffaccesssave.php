
<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$confirmby = $_SESSION['user_name'];
//--------------
$applicantname = $_REQUEST['applicantname'];
$dept = $_REQUEST['dept'];
$user_type = $_REQUEST['user_type'];
$user_email = $_REQUEST['user_email'];
$user_password = $_REQUEST['user_password'];
$checkbox1 = $_REQUEST['checkbox1'];
$checkbox2 = $_REQUEST['checkbox2'];
$checkbox3 = $_REQUEST['checkbox3'];
$checkbox4 = $_REQUEST['checkbox4'];
$checkbox5 = $_REQUEST['checkbox5'];
$checkbox6 = $_REQUEST['checkbox6'];
$checkbox7 = $_REQUEST['checkbox7'];
$checkbox8 = $_REQUEST['checkbox8'];
$checkbox9 = $_REQUEST['checkbox9'];
$checkbox10 = $_REQUEST['checkbox10'];
$checkbox11 = $_REQUEST['checkbox11'];
$checkbox12 = $_REQUEST['checkbox12'];
$checkbox13 = $_REQUEST['checkbox13'];
$checkbox14 = $_REQUEST['checkbox14'];
$apptype = $_SESSION['apptype'];
$appabbrv = $_SESSION['appabbrv'];
$user_status = "Active";

$sql="INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,PMG,WMG,CMG,HRG,AMG,RPT,SMG,TRD,TRDREP,DEL,DIS,REB,DELTRS,department,apptype,appabbrv)
VALUES
('$user_email','$user_password', '$applicantname','$user_type','$clientid','$user_status','$checkbox1','$checkbox2','$checkbox3','$checkbox4','$checkbox5','$checkbox6','$checkbox7','$checkbox8','$checkbox9','$checkbox11','$checkbox10','$checkbox12','$checkbox13','$checkbox14','$dept','$apptype','$appabbrv')";
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}
echo "<script>
alert('Staff access setup successfully.');
window.location.href='staffaccess.php';
</script>";

?>



