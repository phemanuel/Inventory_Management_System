<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$tradeid = $_SESSION['tradeid'];
$date1 = date('Y-m-d');
$time1 = date("h:i:sa");
$datekeep=strtotime($date1);
if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
		$card_amount= $_POST["card_amount"];
	$card_rate= $_POST["card_rate"];
	$rmb_value= $_POST["rmb_value"];
	$customer_rate= $_POST["customer_rate"];
	$customer_rate1= ($customer_rate * $card_amount);
	$amount_sold = ($card_amount * $card_rate * $rmb_value) ;
	$profit = ($amount_sold - $customer_rate1);
		$query = "
		INSERT INTO trading (vendor_name, card_rate,amount_sold, rmb_value,customer_name,mobile_no,customer_rate,card_name,card_amount,profit,date1,time1,confirm_by,clientid,tradeid,status,transstatus,refcode) 
		VALUES (:vendor_name, :card_rate,:amount_sold, :rmb_value,:customer_name,:mobile_no,:customer_rate,:card_name,:card_amount,:profit,:date1,:time1,:confirm_by,:clientid,:tradeid,:status,:transstatus,:refcode)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':vendor_name'		=>	$_POST["vendor_name"],
				':card_rate'		=>	$_POST["card_rate"],
				':amount_sold'		=>	$amount_sold,
				':rmb_value'		=>	$_POST["rmb_value"],
				':customer_name'		=>	$_POST["customer_name"],
				':mobile_no'		=>	$_POST["mobile_no"],
				':customer_rate'		=>	$_POST["customer_rate"],
				':card_name'		=>	$_POST["card_name"],
				':card_amount'		=>	$_POST["card_amount"],
				':profit'		=>	$profit,
				':date1'		=>	$date1,
				':time1'		=>	$time1,
				':confirm_by'		=>	$user_name,
				':clientid'		=>	$clientid,
				':tradeid'		=>	$tradeid,
				':status'		=>	'Active',
				':transstatus'		=>	'Not Confirmed',
				':refcode'		=>	$_POST["refcode"],
				
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Trading Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM trading 
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
				<td>Card Name</td>
				<td>'.$row["card_name"].'</td>
			</tr>
			
			<tr>
				<td>Card Amount</td>
				<td>'.$row["card_amount"].'</td>
			</tr>
			<tr>
				<td>Vendor Name</td>
				<td>'.$row["vendor_name"].'</td>
			</tr>
			<tr>
				<td>Rate</td>
				<td>'.$row["card_rate"].'</td>
			</tr>
			<tr>
				<td>RMB Value</td>
				<td>'.$row["rmb_value"].'</td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td>'.$row["customer_name"].'</td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>'.$row["mobile_no"].' </td>
			</tr>
			<tr>
				<td>Customer Rate</td>
				<td>'.$row["customer_rate"].'</td>
			</tr>
			<tr>
				<td>Profit</td>
				<td>'.$row["profit"].'</td>
			</tr>
			<tr>
				<td>Confirm By</td>
				<td>'.$row["confirm_by"].'</td>
			</tr>
			<tr>
				<td>Trans Date</td>
				<td>'.$row["date1"].'</td>
			</tr>
			<tr>
				<td>Trans Time</td>
				<td>'.$row["time1"].'</td>
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
		SELECT * FROM trading WHERE product_id = :product_id
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
			$output['vendor_name'] = $row['vendor_name'];
			$output['card_rate'] = $row['card_rate'];
			$output['rmb_value'] = $row['rmb_value'];
			$output['customer_name'] = $row['customer_name'];
			$output['mobile_no'] = $row['mobile_no'];

			$output['customer_rate'] = $row['customer_rate'];
			$output['card_name'] = $row['card_name'];
			$output['card_amount'] = $row['card_amount'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	$card_amount= $_POST["card_amount"];
	$card_rate= $_POST["card_rate"];
	$rmb_value= $_POST["rmb_value"];
	$customer_rate= $_POST["customer_rate"];
	$customer_rate1= ($customer_rate * $card_amount);
	$amount_sold = ($card_amount * $card_rate * $rmb_value) ;
	$profit = ($amount_sold - $customer_rate1);
		$query = "
		UPDATE trading
		set vendor_name = :vendor_name,
		card_rate = :card_rate,
		rmb_value = :rmb_value, 
		customer_name = :customer_name, 
		mobile_no = :mobile_no, 
		customer_rate = :customer_rate, 
		card_name = :card_name, 
		card_amount = :card_amount,
		amount_sold = :amount_sold,
		profit = :profit
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':vendor_name'			=>	$_POST['vendor_name'],
				':card_rate'			=>	$_POST['card_rate'],
				':rmb_value'	=>	$_POST['rmb_value'],
				':customer_name'		=>	$_POST['customer_name'],
				':mobile_no'			=>	$_POST['mobile_no'],
				':customer_rate'	=>	$_POST['customer_rate'],
				':card_name'	=>	$_POST['card_name'],
				':card_amount'			=>	$_POST['card_amount'],
				':amount_sold'			=>	$amount_sold,
				':profit'			=>	$profit,
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Trading Details Edited';
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
		UPDATE trading 
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