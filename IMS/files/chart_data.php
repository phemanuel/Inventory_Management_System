<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'ims';
$username = 'root';
$password = 'root1987';

$yearkeep = date('Y'); // Enclose 'Y' within quotation marks

try {
    // Create a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Prepare and execute a query to fetch sales data grouped by month
    $query = "SELECT YEAR(supplydate) AS year, MONTH(supplydate) AS month, SUM(product_profit) AS total_profit 
              FROM supply 
              WHERE YEAR(supplydate) = :year 
              GROUP BY YEAR(supplydate), MONTH(supplydate)
              ORDER BY YEAR(supplydate), MONTH(supplydate)";
    
    $statement = $pdo->prepare($query);
    $statement->bindParam(':year', $yearkeep, PDO::PARAM_INT);
    $statement->execute();
    
    // Fetch the data and format it for JavaScript
    $data = [
        'months' => [],
        'amounts' => [],
    ];
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data['months'][] = date('F', mktime(0, 0, 0, $row['month'], 1)); // Format month name
        $data['amounts'][] = $row['total_profit'];
    }
    
    // Close the database connection
    $pdo = null;
    
    // Send the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    // Handle any PDO exceptions
    die('PDO Error: ' . $e->getMessage());
}

?>
