<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$date1 = date('Y-m-d');
$time1 = date("h:i:sa");
if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
				$query = "
		INSERT INTO delivery (customer_name, item_name,pickup_location, delivery_location,price,pickup_time,delivery_time,payment_mode,date1,status,agent_name,remark,confirm_by,clientid,mobile_no,payment_status,refcode) 
		VALUES (:customer_name, :item_name,:pickup_location, :delivery_location,:price,:pickup_time,:delivery_time,:payment_mode,:date1,:status,:agent_name,:remark,:confirm_by,:clientid,:mobile_no,:payment_status,:refcode)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'		=>	$_POST["customer_name"],
				':item_name'		=>	$_POST["item_name"],
				':pickup_location'		=>	$_POST["pickup_location"],
				':delivery_location'		=>	$_POST["delivery_location"],
				':price'		=>	$_POST["price"],
				':pickup_time'		=>	$_POST["pickup_time"],
				':delivery_time'		=>	$_POST["delivery_time"],
				':payment_mode'		=>	$_POST["payment_mode"],
				':date1'		=>	$date1,
				':status'		=>	$_POST["status"],
				':agent_name'		=>	$_POST["agent_name"],
				':remark'		=>	$_POST["remark"],
				':confirm_by'		=>	$user_name,
				':clientid'		=>	$clientid,
				':mobile_no'		=>	$_POST["mobile_no"],
				':payment_status'		=>	$_POST["payment_status"],
				':refcode'		=>	$_POST["refcode"],
				
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Delivery Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM delivery 
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
			if($row['status'] == 'Delivered')
			{
				$status = '<span class="label label-success">Delivered</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Not delivered</span>';
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
				<td>Item</td>
				<td>'.$row["item_name"].'</td>
			</tr>
			<tr>
				<td>Agent Name</td>
				<td>'.$row["agent_name"].'</td>
			</tr>
			<tr>
				<td>Pick-Up Location</td>
				<td>'.$row["pickup_location"].'</td>
			</tr>
			<tr>
				<td>Deliverey Location</td>
				<td>'.$row["delivery_location"].'</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>'.$row["price"].'</td>
			</tr>
			<tr>
				<td>Pick-Up Time</td>
				<td>'.$row["pickup_time"].'</td>
			</tr>
			<tr>
				<td>Delivery Time</td>
				<td>'.$row["delivery_time"].' </td>
			</tr>
			<tr>
				<td>Payment Mode</td>
				<td>'.$row["payment_mode"].'</td>
			</tr>
			<tr>
				<td>Payment Status</td>
				<td>'.$row["payment_status"].'</td>
			</tr>
			<tr>
				<td>Trans Date</td>
				<td>'.$row["date1"].'</td>
			</tr>
			
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
			</tr>
			<tr>
				<td>Referal Code</td>
				<td>'.$row["refcode"].'</td>
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
		SELECT * FROM delivery WHERE product_id = :product_id
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
			$output['item_name'] = $row['item_name'];
			$output['agent_name'] = $row['agent_name'];
			$output['pickup_location'] = $row['pickup_location'];
			$output['delivery_location'] = $row['delivery_location'];
			$output['price'] = $row['price'];
			$output['mobile_no'] = $row['mobile_no'];
			$output['pickup_time'] = $row['pickup_time'];
			$output['delivery_time'] = $row['delivery_time'];
			$output['payment_mode'] = $row['payment_mode'];
			$output['remark'] = $row['remark'];
			$output['status'] = $row['status'];
			$output['payment_status'] = $row['payment_status'];
			$output['refcode'] = $row['refcode'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
		$query = "
		UPDATE delivery
		set customer_name = :customer_name,
		item_name = :item_name,
		agent_name = :agent_name,
		pickup_location = :pickup_location, 
		delivery_location = :delivery_location,
		price = :price,
		mobile_no = :mobile_no, 
		pickup_time = :pickup_time, 
		delivery_time = :delivery_time, 
		payment_mode = :payment_mode,
		remark = :remark,
		payment_status = :payment_status,
		refcode = :refcode,
		status = :status
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'			=>	$_POST['customer_name'],
				':item_name'			=>	$_POST['item_name'],
				':agent_name'	=>	$_POST['agent_name'],
				':pickup_location'		=>	$_POST['pickup_location'],
				':delivery_location'			=>	$_POST['delivery_location'],
				':price'	=>	$_POST['price'],
				':mobile_no'	=>	$_POST['mobile_no'],
				':pickup_time'			=>	$_POST['pickup_time'],
				':delivery_time'			=>	$_POST['delivery_time'],
				':payment_mode'			=>	$_POST['payment_mode'],
				':remark'			=>	$_POST['remark'],
				':status'			=>	$_POST['status'],
				':payment_status'			=>	$_POST['payment_status'],
				':refcode'			=>	$_POST['refcode'],
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Delivery Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE delivery 
		SET status = :status 
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
			echo 'Trading status change to ' . $status;
		}
	}
}


?>