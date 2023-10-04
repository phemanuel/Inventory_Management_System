<?php
 include "dbconfig.php" ;
$categoryid = $_GET['id'] ; 
 $clientid = $_SESSION['clientid'];

 $sql="SELECT * FROM clientcategory WHERE category_id='$categoryid' and clientid='$clientid' and status='active'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
{
$categoryname= $rowval['category_name'];

}//header("location:adminpage.php");
}
 
 $sql1="SELECT * FROM product WHERE category_name='$categoryname' and clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1 >= 1){

goto c;

}
else{
echo "<script>
alert('Product not available for the category.');
window.location.href='productlist.php';
</script>";

}
 exit;
 
 c:
//Our MySQL connection details.
$host = 'localhost';
$user = 'eitccomn_eitcuser';
$password = 'eitccon231027';
$database = 'eitccomn_ims';
 
//Connect to MySQL using PDO.
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
 
//Create our SQL query.
$sql = "SELECT product_barcode,product_name,product_description,product_quantity,product_unit,product_base_price,product_status FROM product WHERE category_name='$categoryname' and clientid='$clientid'";
 
//Prepare our SQL query.
$statement = $pdo->prepare($sql);
 
//Executre our SQL query.
$statement->execute();
 
//Fetch all of the rows from our MySQL table.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
 
//Get the column names.
$columnNames = array();
if(!empty($rows)){
    //We only need to loop through the first row of our result
    //in order to collate the column names.
    $firstRow = $rows[0];
    foreach($firstRow as $colName => $val){
        $columnNames[] = $colName;
    }
}
 $date1 = date('d-m-Y');
//Setup the filename that our CSV will have when it is downloaded.
$fileName1 = $categoryname . "Product List " . $date1 . ".csv" ;
$fileName = $fileName1;
 
//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
 
//Open up a file pointer
$fp = fopen('php://output', 'w');
 
//Start off by writing the column names to the file.
fputcsv($fp, $columnNames);
 
//Then, loop through the rows and write them to the CSV file.
foreach ($rows as $row) {
    fputcsv($fp, $row);
}
 
//Close the file pointer.
fclose($fp);
?>





