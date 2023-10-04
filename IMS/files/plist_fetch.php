<?php

//category_fetch.php

include('database_connection.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM clientcategory
WHERE clientid = '".$_SESSION['clientid']."' AND
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(category_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR status LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY category_id ASC ';
}

if($_POST['length'] != -1)
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
	if($row['status'] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['category_name'];
	$sub_array[] = $status;$sub_array[] = '<a href="exportcsv.php?id='.$row["category_id"].'" class="btn btn-info btn-xs">Export CSV</a>';
	$data[] = $sub_array;
}

$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM clientcategory WHERE clientid = '".$_SESSION['clientid']."'");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>