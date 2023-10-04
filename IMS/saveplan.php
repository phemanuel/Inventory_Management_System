<?php
include ('dbconfig.php');

$yearkeep = date('Y');
$clientname = $_REQUEST['clientid'];
$clientid = substr($clientname, 0, 5). $_SESSION['appabbrv'];
$clientpass = $clientid . $yearkeep;
$clientemail = $_REQUEST['clientemailaddy'];
$clientmobileno = $_REQUEST['clientmobileno'];
$datekeep = date('Y-m-d');
$clientplan = $_SESSION['clientplan'];
$clientstatus = "Inactive";
$clientsub = $_REQUEST['clientsub'];
$apptype = $_SESSION['apptype'];
$appabbrv = $_SESSION['appabbrv'];

if ($clientsub == "Monthly") {
$clientsub1 = "1";
}
else if ($clientsub == "Annually") {
$clientsub1 = "12";
}
//===================================
if ($clientplan == "BASIC" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['bpricekeep'];
$storagekeep = $_SESSION['bstoragekeep'];
$staffkeep = $_SESSION['bstaffkeep'];

}
else if ($clientplan == "BASIC" && $clientsub == "Annually") {
$pricekeep = $_SESSION['bpricekeepannual'];
$storagekeep = $_SESSION['bstoragekeep'];
$staffkeep = $_SESSION['bstaffkeep'];

}

else if ($clientplan == "STANDARD" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['spricekeep'];
$storagekeep = $_SESSION['sstoragekeep'];
$staffkeep = $_SESSION['sstaffkeep'];
}
else if ($clientplan == "STANDARD" && $clientsub == "Annually") {
$pricekeep = $_SESSION['spricekeepannual'];
$storagekeep = $_SESSION['sstoragekeep'];
$staffkeep = $_SESSION['sstaffkeep'];
}
else if ($clientplan == "PROFESSIONAL" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['ppricekeep'];
$storagekeep = $_SESSION['pstoragekeep'];
$staffkeep = $_SESSION['pstaffkeep'];

}
else if ($clientplan == "PROFESSIONAL" && $clientsub == "Annually") {
$pricekeep = $_SESSION['ppricekeepannual'];
$storagekeep = $_SESSION['pstoragekeep'];
$staffkeep = $_SESSION['pstaffkeep'];

}
//============= Get price===============

$sql1="SELECT * FROM clientreg WHERE clientid='$clientid'and clientname='$clientname'  ";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
echo "<script>
alert ('The company account has been created already.');
window.location.href='register.php';
</script>";
}
else {
goto a;

}

exit;

a:
//=======upload logo

if(isset($_FILES['file'])){

$file= $_FILES['file'];

$upload_directory='uploads/';

//$ext_str = "gif,jpg,jpeg,mp3,tiff,bmp,doc,docx,ppt,pptx,txt,pdf";
$ext_str = "jpg,jpeg";

$allowed_extensions=explode(',',$ext_str);

$max_file_size = 10485760;//10 mb remember 1024bytes =1kbytes /* check allowed extensions here */

$ext = substr($file['name'], strrpos($file['name'], '.') + 1); //get file extension from last sub string from last . character

if (!in_array($ext, $allowed_extensions) ) {

echo "only".$ext_str." files allowed to upload"; // exit the script by warning

} /* check file size of the file if it exceeds the specified size warn user */

if($file['size']>=$max_file_size){

echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning

}

//if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){

//$path= $applicationno .'.'.$ext;
$path= $clientid .'.jpg';
$docnamekeep= $clientid .'.'.$ext;

if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){
//include "dbconfig.php";
//========insert into db
$sql="INSERT INTO clientreg (clientid,clientname,clientpass, clientstatus,clientplan,clienttype,clientsize,clientaddress, clientemailaddy, clientmobileno,clientlogo, dateregistered, startdate, duedate, clientstorage,clientsub,clientpay,apptype,appabbrv)
VALUES
('$clientid', '$clientname','$clientpass', '$clientstatus','$clientsub1', '$clientplan','$staffkeep','NILL', '$clientemail', '$clientmobileno', '$path', '$datekeep', '$datekeep', '$datekeep', '$storagekeep','$clientsub','$pricekeep','$apptype','$appabbrv')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error($conn));
}
//================
$sql2="INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,PMG,WMG,CMG,HRG,AMG,RPT,SMG,department)
VALUES
('$clientid', '$clientpass','$clientname', 'master','$clientid', 'Inactive','Enable','Enable', 'Enable', 'Enable','Enable','Enable','Enable', 'Enable', 'Admin')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
//$result1=mysqli_query($conn,$sql1);
if (!mysqli_query($conn,$sql2))
{
die('error:' . mysqli_error($conn));
}

//=======================
  echo "<script>
alert('Account setup successful.');
window.location.href='../index.php';
</script>";

 }

else{

echo "<script>
alert('Error while uploading logo.');
window.location.href='register.php';
</script>";
}

}
exit ;



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
