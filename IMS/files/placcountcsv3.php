<?php
 include "dbconfig.php" ;

$clientid = $_SESSION['clientid'];

$paymentstatuskeep = $_SESSION['paymentstatuskeep'];
$startdate = date("Y-m-d", strtotime($_SESSION['startdate']));  
$enddate = date("Y-m-d", strtotime($_SESSION['enddate'])); 
//Our MySQL connection details.
$host = 'localhost';
$user = 'root';
$password = 'root1987';
$database = 'ims';
 
//Connect to MySQL using PDO.
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
 
//Create our SQL query.
$sql = "SELECT debit,transdate,transtime,paymenttype,narration,confirmby FROM profitloss WHERE transdate BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and clientid='$clientid' and paymenttype='$paymentstatuskeep'  ";
 
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
$fileName1 = "profit and Loss (DEBIT) Report  ". $date1 . ".csv" ;
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



