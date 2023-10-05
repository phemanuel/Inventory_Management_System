<?php
include('dbconfig.php');
$clientid = $_SESSION['clientid'];
$yearkeep = date('Y');
$datekeep = date('Y-m-d H:i:s');


$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Iterate through the months
foreach ($months as $month) {
    // Initialize a variable to store the total sum for the current month
    $monthlySum = 0;
    $monthlyExpenseSum = 0;

    // Refactor your SQL queries to sum the values for the current month
    $monthNumber = array_search($month, $months) + 1;  // Convert month name to month number
    $year = date('Y', strtotime($datekeep));  // Extract the year from the date
    
    // For table 'trading'
    $result1 = mysqli_query($conn, "SELECT SUM(profit) AS value_sum FROM trading WHERE MONTH(date1) = $monthNumber AND YEAR(date1) = $year AND clientid='$clientid'");
    $row1 = mysqli_fetch_assoc($result1);
    $sum1 = $row1['value_sum'];
    $monthlySum += $sum1;

    // For table 'supply1'
    $result2 = mysqli_query($conn, "SELECT SUM(totalprofit) AS value_sum FROM supply1 WHERE MONTH(supplydate) = $monthNumber AND YEAR(supplydate) = $year AND clientid='$clientid'");
    $row2 = mysqli_fetch_assoc($result2);
    $sum2 = $row2['value_sum'];
    $monthlySum += $sum2;

    // For table 'datainfo1'
    $result3 = mysqli_query($conn, "SELECT SUM(profit) AS value_sum FROM datainfo1 WHERE MONTH(date1) = $monthNumber AND YEAR(date1) = $year AND clientid='$clientid'");
    $row3 = mysqli_fetch_assoc($result3);
    $sum3 = $row3['value_sum'];
    $monthlySum += $sum3;
    //====income airtime-------
    $result4 = mysqli_query($conn,"SELECT SUM(profit) AS value_sum FROM airtime_info WHERE MONTH(date1) = $monthNumber AND YEAR(date1) = $year and clientid='$clientid'"); 
    $row4 = mysqli_fetch_assoc($result4); 
    $sum4 = $row4['value_sum'];
    $monthlySum += $sum4;
    //------------------------------------
    //====income cabletv-------
    $result5 = mysqli_query($conn,"SELECT SUM(profit) AS value_sum FROM cabletv WHERE MONTH(date1) = $monthNumber AND YEAR(date1) = $year and clientid='$clientid'"); 
    $row5 = mysqli_fetch_assoc($result5); 
    $sum5 = $row5['value_sum'];
    $monthlySum += $sum5;
    //------------------------------------

    // Query for 'OPERATIONS' expenses
    $result7 = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM purchase1 WHERE MONTH(purchasedate) = $monthNumber AND YEAR(purchasedate) = $year AND dept = 'OPERATIONS' AND clientid='$clientid'");
    $row7 = mysqli_fetch_assoc($result7);
    $sum7 = $row7['value_sum'];
    $monthlyExpenseSum += $sum7;

    // Query for 'DELIVERY' expenses
    $result8 = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM purchase1 WHERE MONTH(purchasedate) = $monthNumber AND YEAR(purchasedate) = $year AND dept = 'DELIVERY' AND clientid='$clientid'");
    $row8 = mysqli_fetch_assoc($result8);
    $sum8 = $row8['value_sum'];
    $monthlyExpenseSum += $sum8;

    // Query for 'GADGET' expenses
    $result9 = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM purchase1 WHERE MONTH(purchasedate) = $monthNumber AND YEAR(purchasedate) = $year AND dept = 'GADGET' AND clientid='$clientid'");
    $row9 = mysqli_fetch_assoc($result9);
    $sum9 = $row9['value_sum'];
    $monthlyExpenseSum += $sum9;

    // Query for 'EXCHANGE' expenses
    $result10 = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM purchase1 WHERE MONTH(purchasedate) = $monthNumber AND YEAR(purchasedate) = $year AND dept = 'EXCHANGE' AND clientid='$clientid'");
    $row10 = mysqli_fetch_assoc($result10);
    $sum10 = $row10['value_sum'];
    $monthlyExpenseSum += $sum10;

    // Query for 'ENTERPRISE' expenses
    $result11 = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM purchase1 WHERE MONTH(purchasedate) = $monthNumber AND YEAR(purchasedate) = $year AND dept = 'ENTERPRISE' AND clientid='$clientid'");
    $row11 = mysqli_fetch_assoc($result11);
    $sum11 = $row11['value_sum'];
    $monthlyExpenseSum += $sum11;

    $query = "INSERT INTO income_expense (month1, income_amount, expense_amount, year1, clientid)
              VALUES ('$month', $monthlySum, $monthlyExpenseSum, '$yearkeep', '$clientid')
              ON DUPLICATE KEY UPDATE income_amount = $monthlySum, expense_amount = $monthlyExpenseSum";
    
    mysqli_query($conn, $query);
}

// Close the database connection when done
mysqli_close($conn);

?>