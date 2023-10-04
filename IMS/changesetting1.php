<?php
 //session_start(); 
 
  
include_once 'dbconfig1.php';

//=====check for form type====
$formtype = $_REQUEST['formtype'];

if ($formtype == "basic") {
goto a ;

}
else if ($formtype == "password") {
goto b ;

}
else if ($formtype == "logo") {
goto c ;

}

exit;

a:
//=======basic info update
$clientname = $_REQUEST['clientname'];
$clientmobileno = $_REQUEST['clientmobileno'];
$clientemail = $_REQUEST['clientemail'];
$clientaddress = $_REQUEST['address'];
$clientid = $_SESSION['clientid'];

$sql2 = "UPDATE clientreg SET clientname='".$clientname."',clientmobileno='".$clientmobileno."',clientemailaddy='".$clientemail."',clientaddress='".$clientaddress."' WHERE clientid='".$clientid."'";
   $result2 = mysqli_query($conn,$sql2);
   echo "<script>
alert('Update Successful.');
window.location.href='logout1.php';
</script>";
//======================
exit;

b:
//----------------password update
$oldpass1 = $_SESSION['clientpass'];
$clientid = $_SESSION['clientid'];
// username and password sent from form 
$oldpass=$_REQUEST['oldpass']; 
$newpass=$_REQUEST['newpass']; 



if ($oldpass == $oldpass1) {

goto d ;
}
else {
echo "<script>
alert('You have entered the wrong password.');
window.location.href='changesetting.php';
</script>";
}
exit;

d:
//update password-------
$sql2 = "UPDATE clientreg SET clientpass='".$newpass."' WHERE clientid='".$clientid."'";
   $result2 = mysqli_query($conn,$sql2);
   echo "<script>
alert('Your password has been updated.');
window.location.href='logout1.php';
</script>";
//========================
exit ;

c:
//==========logo update
//=======upload logo
$clientid = $_SESSION['clientid'];

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
$sql= "UPDATE clientreg SET clientlogo='".$path."' WHERE clientid='".$clientid."'";
//$result = mysqli_query($conn, $sql );
$result=mysqli_query($conn,$sql);
//================

if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error($conn));
}

//=======================
  echo "<script>
alert('Upload successful.');
window.location.href='logout1.php';
</script>";

 }

else{

echo "<script>
alert('Error while uploading logo.');
window.location.href='dashboard.php';
</script>";
}

}
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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
