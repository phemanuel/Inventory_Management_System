<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM customer
WHERE clientid = '".$_SESSION['clientid']."' AND
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(customername LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR mobileno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR birthmonth LIKE "%'.$_POST["search"]["value"].'%") ';
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
	$status = '';
	if($row["status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['customername'];
	$sub_array[] = $row['emailaddy'];
	$sub_array[] = $row['mobileno'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["rid"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["rid"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["status"].'">Change</button>';
	$sub_array[] = '<a href="customerorder.php?id='.$row["mobileno"].'" class="btn btn-info btn-xs">View Orders</a>';
		$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM customer WHERE clientid = '".$_SESSION['clientid']."' ");
	$statement->execute();
	return $statement->rowCount();
}

?>