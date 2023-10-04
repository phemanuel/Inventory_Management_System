<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$date1 = date('Y-m-d');
$supplyid = $_SESSION['supplyid'];

if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO cuorder (customer_name, mobile_no, customer_order,date1,status,confirm_by,clientid,supplyid) 
		VALUES (:customer_name, :mobile_no, :customer_order,:date1,:status,:confirm_by,:clientid,:supplyid)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'		=>	$_POST["customer_name"],
				':mobile_no'		=>	$_POST["mobile_no"],
				':customer_order'		=>	$_POST["customer_order"],
				':date1'		=>	$date1,
				':status'		=>	'Active',
				':confirm_by'		=>	$user_name,	
				':clientid'		=>	$clientid,
				':supplyid'		=>	$supplyid
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Pre-Order Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM cuorder 
	    WHERE product_id = '".$_POST["product_id"]."' AND
		clientid = '".$_SESSION["clientid"]."' 
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';
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
			$output .= '
			<tr>
				<td>Customer Name</td>
				<td>'.$row["customer_name"].'</td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>'.$row["mobile_no"].'</td>
			</tr>
			<tr>
				<td>Customer Order</td>
				<td>'.$row["customer_order"].'</td>
			</tr>
			
			<tr>
				<td>Enter By</td>
				<td>'.$row["confirm_by"].'</td>
			</tr>
			<tr>
				<td>Order Status</td>
				<td>'.$row["orderstatus"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
			</tr>
			';
		}
		$output .= '
			</table>
		</div>
		';
		echo $output;
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM cuorder WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_id'	=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['customer_name'] = $row['customer_name'];
			$output['mobile_no'] = $row['mobile_no'];
			$output['customer_order'] = $row['customer_order'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE cuorder 
		set customer_name = :customer_name,
		mobile_no = :mobile_no,
		customer_order = :customer_order,
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'			=>	$_POST['customer_name'],
				':mobile_no'			=>	$_POST['mobile_no'],
				':customer_order'	=>	$_POST['customer_order'],
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Pre-Order Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Confirmed';
	
		$query = "
		UPDATE cuorder
		SET orderstatus = :status 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	=>	$status,
				':product_id'		=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Pre-Order has been ' . $status;
		}
	}
}


?>