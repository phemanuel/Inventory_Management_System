<?php

//user_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

$query = '';

$output = array();

$query .= "
SELECT * FROM deptsetup
WHERE clientid = '".$_SESSION['clientid']."' AND
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(deptname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR depthod LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR deptstatus LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY deptid ASC ';
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
	if($row["deptstatus"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['deptname'];
	$sub_array[] = $row['depthod'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["deptid"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["deptid"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["deptstatus"].'">Change</button>';
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
	$statement = $connect->prepare("SELECT * FROM deptsetup WHERE clientid = '".$_SESSION['clientid']."' ");
	$statement->execute();
	return $statement->rowCount();
}

?>