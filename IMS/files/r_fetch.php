<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM recruitment
WHERE clientid = '".$_SESSION['clientid']."' AND
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(applicantname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR applicantno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR dept LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR postapplied LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY status ASC ';
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
	$sub_array[] = $row['applicantno'];
	$sub_array[] = $row['applicantname'];
	$sub_array[] = $row['postapplied'];
	$sub_array[] = $row['interviewdate'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["rid"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["rid"].'" class="'.$status_class.'" data-status="'.$row["status"].'">'.$status_action.'</button>';
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
	$statement = $connect->prepare("SELECT * FROM recruitment WHERE clientid = '".$_SESSION['clientid']."' ");
	$statement->execute();
	return $statement->rowCount();
}

?>