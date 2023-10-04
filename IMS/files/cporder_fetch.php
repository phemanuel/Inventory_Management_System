<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM product
WHERE clientid = '".$_SESSION['clientid']."' AND
product_status = 'Active' AND

";

if(isset($_POST["search"]["value"]))
{
	$query .= '(product_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_base_price LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_barcode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR product_type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR category_name LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$status = '';
	if($row["product_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['product_barcode'];
	$sub_array[] = $row['product_name'];
	$sub_array[] = $row['product_sell_price'];
	$sub_array[] = $row['product_quantity'];
	
	$sub_array[] = '<a href="csupplyitem.php?id='.$row["product_id"].'" class="btn btn-info btn-xs">Pre-Order</a>';
	
	
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
	$statement = $connect->prepare("SELECT * FROM product WHERE clientid = '".$_SESSION['clientid']."' AND
product_status = 'Active' ");
	$statement->execute();
	return $statement->rowCount();
}

?>