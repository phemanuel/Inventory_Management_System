<?php
 include "dbconfig.php" ;

$clientid = $_SESSION['clientid'];
$yearkeep = $_SESSION['yearkeep'];

//Our MySQL connection details.
$host = 'localhost';
$user = 'eitccomn_eitcuser';
$password = 'eitccon231027';
$database = 'eitccomn_ims';
 
//Connect to MySQL using PDO.
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
 
//Create our SQL query.
$sql = "SELECT supplyid,itemsupplier,totalquantity,totalamount,supplydate,mobileno,paymentmode FROM supply1 WHERE clientid='$clientid' and year1='$yearkeep' ";
 
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
$fileName1 = "All Sales Report for  ".$yearkeep . $date1 . ".csv" ;
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



