<?php

//order_fetch.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];
$datekeep = date('d-m-Y');

$query = '';

$output = array();

$query .= "
SELECT * FROM profitloss
WHERE clientid = '".$_SESSION['clientid']."' AND
transstatus = 'Active'AND

";

if(isset($_POST["search"]["value"]))
{
	$query .= '(transdate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR month1 LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR year1 LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR paymenttype LIKE "%'.$_POST["search"]["value"].'%") ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY transdate DESC ';
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
	
	$transstatus = '';
	if($row['paymenttype'] == 'credit')
	{
		$transstatus = '<span class="label label-success">Credit</span>';
	}
	else
	{
		$transstatus = '<span class="label label-danger">Debit</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['credit'];
	$sub_array[] = $row['debit'];
	$sub_array[] = "On : ".$row['transdate'] . "  by : " . $row['transtime'];
	$sub_array[] = $transstatus;
	$sub_array[] = $row['narration'];
	$sub_array[] = $row['confirmby'];
	
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM profitloss WHERE  clientid = '".$_SESSION['clientid']."'");
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