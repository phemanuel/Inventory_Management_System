<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM cabletv
WHERE clientid = '".$_SESSION['clientid']."' AND

";

if(isset($_POST["search"]["value"]))
{
	$query .= '(customername LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cablename LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cableplan LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR mobileno LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY date1 DESC ';
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
	$sub_array[] = $row['mobileno'];
	$sub_array[] = $row['iucno'];
	$sub_array[] = $row['cablename'];
	$sub_array[] = $row['cableplan'];
	$sub_array[] = $row['sellprice'];
	$sub_array[] = $row['date1'];
	$sub_array[] = $row['confirmby'];
		$sub_array[] = $status;
		$sub_array[] = '<button type="button" name="view" id="'.$row["product_id"].'" class="btn btn-info btn-xs view">View</button>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["product_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	
	
	
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
	$statement = $connect->prepare("SELECT * FROM cabletv WHERE clientid = '".$_SESSION['clientid']."'");
	$statement->execute();
	return $statement->rowCount();
}

?>