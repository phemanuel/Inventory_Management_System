<?php

// ... (database connection code here)
// Database connection parameters
$host = 'localhost';
$dbname = 'ims';
$username = 'root';
$password = 'root1987';

$yearkeep = date('Y'); // Enclose 'Y' within quotation marks
// Create a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
// Query to fetch data for the pie chart
$query = "SELECT month1, SUM(product_profit) AS total_profit FROM supply WHERE year1 = :year GROUP BY month1 ORDER BY MONTH(supplydate)";
$statement = $pdo->prepare($query);
$statement->bindParam(':year', $yearkeep, PDO::PARAM_INT);
$statement->execute();

// Data for the pie chart
$pieChartData = [
    'labels' => [],
    'data' => [],
];

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    // Format month name
    $formattedMonth = date('F', mktime(0, 0, 0, $row['month1'], 1));

    // Populate data for pie chart
    $pieChartData['labels'][] = $formattedMonth;
    $pieChartData['data'][] = $row['total_profit'];
}

// Close the database connection
$pdo = null;

// Send data as JSON (for the pie chart)
header('Content-Type: application/json');
echo json_encode(['pieChart' => $pieChartData]);


?>
