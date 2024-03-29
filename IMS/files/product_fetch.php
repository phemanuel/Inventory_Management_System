<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM product
WHERE clientid = '".$_SESSION['clientid']."' AND

";

if(isset($_POST["search"]["value"]))
{
	$query .= '(product_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_base_price LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_barcode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR shelf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_quantity LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY product_id ASC ';
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
	if($row["product_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
		$status_action = 'Deactivate';
		$status_class = 'btn btn-danger btn-xs delete';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
		$status_action = 'Activate';
		$status_class = 'label label-success delete';
	}
	$sub_array = array();
	$sub_array[] = $row['product_barcode'];
	$sub_array[] = $row['category_name'];
	$sub_array[] = $row['product_name'];
	$sub_array[] = $row['product_quantity'].$row['product_unit'];
	$sub_array[] = $row['product_base_price'];
	$sub_array[] = $row['product_sell_price'];
	$sub_array[] = $row['shelf'];
		$sub_array[] = $status;
		$sub_array[] = '<button type="button" name="view" id="'.$row["product_id"].'" class="btn btn-info btn-xs view">View</button>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["product_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["product_id"].'" class="'.$status_class.'" data-status="'.$row["product_status"].'">'.$status_action.'</button>';
	
	
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
	$statement = $connect->prepare("SELECT * FROM product WHERE clientid = '".$_SESSION['clientid']."'");
	$statement->execute();
	return $statement->rowCount();
}

?>