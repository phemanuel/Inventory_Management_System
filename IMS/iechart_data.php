<?php
session_start();
$clientid = $_SESSION['clientid'];
// Database connection parameters
$host = 'localhost';
$dbname = 'ims';
$username = 'root';
$password = 'root1987';

$yearkeep = date('Y'); // Enclose 'Y' within quotation marks

// Define an associative array to map month names to their integer values
$monthMapping = [
    'January' => 1,
    'February' => 2,
    'March' => 3,
    'April' => 4,
    'May' => 5,
    'June' => 6,
    'July' => 7,
    'August' => 8,
    'September' => 9,
    'October' => 10,
    'November' => 11,
    'December' => 12,
];

try {
    // Create a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Prepare and execute a query to fetch income and expense data grouped by month and year
    $query = "SELECT month1, 
                 SUM(income_amount) AS total_income, 
                 SUM(expense_amount) AS total_expense 
          FROM income_expense 
          WHERE year1 = :year AND clientid = :clientid
          GROUP BY month1, year1
          ORDER BY FIELD(month1, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";
    
    $statement = $pdo->prepare($query);
    $statement->bindParam(':year', $yearkeep, PDO::PARAM_INT);
    $statement->bindParam(':clientid', $clientid, PDO::PARAM_STR); // Assuming $clientid is the client ID (string) you want to filter by
    $statement->execute();
    
    // Initialize data arrays
    $data = [
        'months' => [],
        'income_amounts' => [],
        'expense_amounts' => [],
    ];
    
    // Fetch and format the data
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $monthName = date('F', mktime(0, 0, 0, $monthMapping[$row['month1']], 1)); // Format month name
        $data['months'][] = $monthName;
        $data['income_amounts'][] = $row['total_income'];
        $data['expense_amounts'][] = $row['total_expense'];
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
