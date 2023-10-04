<?php
include ('imsdbconfig.php');

$yearkeep = date('Y');
$clientname = $_REQUEST['clientid'];
$apptype = $_REQUEST['apptype'];
$apptype1 = $_REQUEST['apptype'];
$appabbrv = $_REQUEST['appabbrv'];
$clientid = substr($clientname, 0, 5). $_REQUEST['appabbrv'];
$clientpass = $clientid . $yearkeep;
$clientemail = $_REQUEST['clientemailaddy'];
$clientmobileno = $_REQUEST['clientmobileno'];
$datekeep = date('Y-m-d');
$clientplan1 = $_REQUEST['clientplan1'];

//------get plan values
if ($_REQUEST['clientplan1'] == "BASIC"){
    //==================BASIC
    $clientplankeep = "BASIC";
$sql="SELECT * FROM pricing WHERE name = '$clientplankeep' ";
$result=mysqli_query($conn,$sql);


while($rowval = mysqli_fetch_array($result))
{
$bpricekeep= $rowval['price'];
$bstoragekeep= $rowval['storage'];
$bstaffkeep= $rowval['staff'];
$bpricekeepannual= $rowval['priceannual'];
$prodkeep = $rowval['product'];
//$picnamekeep= $rowval['picturename'];

$_SESSION['bpricekeep'] = $bpricekeep ;
$_SESSION['bpricekeepannual'] = $bpricekeepannual;
$_SESSION['bstoragekeep'] = $bstoragekeep ; 
$_SESSION['bstaffkeep'] = $bstaffkeep ; 

}

}
elseif ($_REQUEST['clientplan1'] == "STANDARD"){
    
//==================STANDARD
$clientplankeep = "STANDARD";
$sql1="SELECT * FROM pricing WHERE name = '$clientplankeep' ";
$result1=mysqli_query($conn,$sql1);


while($rowval = mysqli_fetch_array($result1))
{
$spricekeep= $rowval['price'];
$spricekeepannual= $rowval['priceannual'];
$sstoragekeep= $rowval['storage'];
$sstaffkeep= $rowval['staff'];
$prodkeep = $rowval['product'];
//$picnamekeep= $rowval['picturename'];

$_SESSION['spricekeep'] = $spricekeep ;
$_SESSION['spricekeepannual'] = $spricekeepannual;
$_SESSION['sstoragekeep'] = $sstoragekeep ; 
$_SESSION['sstaffkeep'] = $sstaffkeep ; 

}
}
elseif ($_REQUEST['clientplan1'] == "PROFESSIONAL"){
//==================PROFESSIONAL
$clientplankeep = "PROFESSIONAL";
$sql2="SELECT * FROM pricing WHERE name = '$clientplankeep' ";
$result2=mysqli_query($conn,$sql2);


while($rowval = mysqli_fetch_array($result2))
{
$ppricekeep= $rowval['price'];
$ppricekeepannual= $rowval['priceannual'];
$pstoragekeep= $rowval['storage'];
$pstaffkeep= $rowval['staff'];
$prodkeep = $rowval['product'];
//$picnamekeep= $rowval['picturename'];

$_SESSION['ppricekeep'] = $ppricekeep ;
$_SESSION['ppricekeepannual'] = $ppricekeepannual;
$_SESSION['pstoragekeep'] = $pstoragekeep ; 
$_SESSION['pstaffkeep'] = $pstaffkeep ; 

}
}
//========
//-------create due date
 if ($_SESSION['appversion'] == "Trial") {

 	$duedate= date('Y-m-d', strtotime($datekeep. ' + 10 days'));
 	$pricekeep = "N/A";
	$storagekeep = "N/A";
	$prodkeep = "10";
	$clientstatus = "Active";
	$clientsub1 = "10";
	$clientsub = "N/A";
	$clientplan = $_REQUEST['clientplan1'];
	$staffkeep = "2";
	$storagekeep = "1GB";
 	goto b;
 }
 elseif ($_SESSION['appversion'] == "Full") {
$clientstatus = "Inactive";
$duedate= $datekeep;
$clientsub = $_REQUEST['clientsub'];
$clientplan = $_REQUEST['clientplan1'];
goto c;
 }
exit;
//----------- Check client plan--------------
c:
if ($clientsub == "Monthly") {
$clientsub1 = "1";
}
else if ($clientsub == "Annually") {
$clientsub1 = "12";
}
//================get values for client plan===================
if ($_REQUEST['clientplan1'] == "BASIC" && $clientsub == "Monthly") {
$pricekeep = $bpricekeep;
$storagekeep = $bstoragekeep;
$staffkeep = $bstaffkeep;
//$prodkeep = $bprodkeep;


}
else if ($_REQUEST['clientplan1'] == "BASIC" && $clientsub == "Annually") {
$pricekeep = $bpricekeepannual;
$storagekeep = $bstoragekeep;
$staffkeep = $bstaffkeep;
//$prodkeep = $bprodkeep;

}

else if ($_REQUEST['clientplan1'] == "STANDARD" && $clientsub == "Monthly") {
$pricekeep = $spricekeep;
$storagekeep = $sstoragekeep;
$staffkeep = $sstaffkeep;
//$prodkeep = $sprodkeep;
}
else if ($_REQUEST['clientplan1'] == "STANDARD" && $clientsub == "Annually") {
$pricekeep = $spricekeepannual;
$storagekeep = $sstoragekeep;
$staffkeep = $sstaffkeep;
//$prodkeep = $sprodkeep;
}
else if ($_REQUEST['clientplan1'] == "PROFESSIONAL" && $clientsub == "Monthly") {
$pricekeep = $ppricekeep;
$storagekeep = $pstoragekeep;
$staffkeep = $pstaffkeep;
//$prodkeep = $pprodkeep;

}
else if ($_REQUEST['clientplan1'] == "PROFESSIONAL" && $clientsub == "Annually") {
$pricekeep = $ppricekeepannual;
$storagekeep = $pstoragekeep;
$staffkeep = $pstaffkeep;
//$prodkeep = $pprodkeep;

}

goto b;
exit;

//============= Save client information to db===============
b:

$sql1="SELECT * FROM clientreg WHERE clientid='$clientid'and clientname='$clientname'  ";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
echo "<script>
alert ('Account has been created already.');
window.location.href='appversioncheck.php';
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

//echo "only".$ext_str." files allowed to upload"; // exit the script by warning
echo "<script>
alert('only jpg and jpeg files allowed for upload.')
window.location.href='appversioncheck.php'
</script>"; //redirect back
} 
else{
	goto f;
}
exit;

f:

/* check file size of the file if it exceeds the specified size warn user */
if($file['size']>=$max_file_size){

echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning

}

//if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){

//$path= $applicationno .'.'.$ext;
$path= $clientid .'.jpg';
$docnamekeep= $clientid .'.'.$ext;

if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){
goto e ;

 }

else{

echo "<script>
alert('Error while uploading logo.');
window.location.href='appversioncheck.php';
</script>";
}

}
exit ;

e:

include "dbconfig1.php";
//========insert into db
$sql="INSERT INTO clientreg (clientid,clientname,clientpass, clientstatus,clientplan,clienttype,clientsize,clientaddress, clientemailaddy, clientmobileno,clientlogo, dateregistered, startdate, duedate, clientstorage,clientsub,clientpay,apptype,appabbrv,productsize)
VALUES
('$clientid', '$clientname','$clientpass', '$clientstatus','$clientsub1', '$clientplan1','$staffkeep','NILL', '$clientemail', '$clientmobileno', '$path', '$datekeep', '$datekeep', '$duedate', '$storagekeep','$clientsub','$pricekeep','$apptype','$appabbrv','$prodkeep')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error($conn));
}
//================

$sql2="INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,PMG,WMG,CMG,HRG,AMG,RPT,SMG,department,apptype,appabbrv)
VALUES
('$clientid', '$clientpass','$clientname', 'master','$clientid', '$clientstatus','Enable','Enable', 'Enable', 'Enable','Enable','Enable','Enable', 'Enable', 'Admin','$apptype','$appabbrv')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
//$result1=mysqli_query($conn,$sql1);
if (!mysqli_query($conn,$sql2))
{
die('error:' . mysqli_error($conn));
}
//============
include('imsdbconfig1.php');
$sql3="INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,PMG,WMG,CMG,HRG,AMG,RPT,SMG,department,apptype,appabbrv)
VALUES
('$clientid', '$clientpass','$clientname', 'master','$clientid', '$clientstatus','Enable','Enable', 'Enable', 'Enable','Enable','Enable','Enable', 'Enable', 'Admin','$apptype','$appabbrv')";

if (!mysqli_query($conn,$sql3))
{
die('error:' . mysqli_error($conn));
}
//=======================
  echo "<script>
alert('Account setup successful, check your email for verification and login details.');
window.location.href='https://eitc.com.ng';
</script>";



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

