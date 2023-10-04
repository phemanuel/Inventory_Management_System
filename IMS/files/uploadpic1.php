<?php
include('dbconfig.php');
$clientid = $_SESSION['clientid'];
 if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert ('Your session has expired. try to login again.');
window.location.href='../logout.php';
</script>";
}
else{
goto a;
}
exit ;
a:

 $rid = $_SESSION['rid'];
 
$sql1="SELECT * FROM recruitment WHERE rid='$rid'";
$result1=mysqli_query($conn,$sql1);

$count1=mysqli_num_rows($result1);

 while($rowval = mysqli_fetch_array($result1))
 {
 $applicantnokeep= $rowval['applicantno'];

}

//==========upload document===========

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
$path= $applicantnokeep .'.jpg';
$docnamekeep= $applicantnokeep .'.'.$ext;

if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){

$sql="UPDATE recruitment SET picturename='$path' WHERE rid='".$rid."'"; 
 
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
  mysqli_query($conn,$sql);
  echo "<script>
alert('Picture upload successful.');
window.location.href='staffsetup.php';
</script>";


}

else{

echo "<script>
alert('Error while uploading picture.');
window.location.href='staffsetup.php';
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
