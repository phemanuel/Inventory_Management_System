<?php

//order_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];
$customerid = $_SESSION['customerid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM supply1
WHERE transstatus = 'Active' AND 
mobileno = '".$_SESSION['customerid']."' AND 
clientid = '".$_SESSION['clientid']."' AND


";

if(isset($_POST["search"]["value"]))
{
	$query .= '(supplyid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR itemsupplier LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY rid ASC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$payment_status = '';

	if($row['status'] == 'Paid')
	{
		$payment_status = '<span class="label label-primary">Paid</span>';
	}
	else
	{
		$payment_status = '<span class="label label-warning">Not Paid</span>';
	}

	$status = '';
	if($row['transstatus'] == 'Active')
	{
		$transstatus = '<span class="label label-success">Active</span>';
	}
	else
	{
		$transstatus = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['supplyid'];
	$sub_array[] = $row['itemsupplier'];
	$sub_array[] = $row['totalamount'];
	$sub_array[] = $payment_status;
	$sub_array[] = $transstatus;
	$sub_array[] = $row['supplydate'];
	$sub_array[] = $row['confirmby'];
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM supply1 WHERE transstatus = 'Active' AND 
mobileno = '".$_SESSION['customerid']."' AND clientid = '".$_SESSION['clientid']."'");
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"    			=> 	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);	

echo json_encode($output);

?>