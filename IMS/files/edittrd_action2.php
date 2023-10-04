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
		INSERT INTO trading (vendor_name, card_rate,amount_sold, rmb_value,customer_name,mobile_no,customer_rate,card_name,card_amount,profit,date1,time1,confirm_by,clientid,tradeid,status,transstatus) 
		VALUES (:vendor_name, :card_rate,:amount_sold, :rmb_value,:customer_name,:mobile_no,:customer_rate,:card_name,:card_amount,:profit,:date1,:time1,:confirm_by,:clientid,:tradeid,:status,:transstatus)
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
				':transstatus'		=>	'Not Confirmed'
				
				
				
				
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
		SELECT * FROM tradingbtc 
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
				<td>Crypto Name</td>
				<td>'.$row["crypto_name"].'</td>
			</tr>
			
			<tr>
				<td>Dollar Value</td>
				<td>'.$row["dollar_value"].'</td>
			</tr>
			<tr>
				<td>Fraction</td>
				<td>'.$row["frac_value"].'</td>
			</tr>
			<tr>
				<td>Customer Rate</td>
				<td>'.$row["customer_rate"].'</td>
			</tr>
			<tr>
				<td>Selling Rate</td>
				<td>'.$row["selling_rate"].'</td>
			</tr>
			<tr>
				<td>Total Amount (Customer)</td>
				<td>'.$row["totalamount_cus"].'</td>
			</tr>
			<tr>
				<td>Total AMount (Sold Out)</td>
				<td>'.$row["totalamount_cl"].' </td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td>'.$row["customer_name"].'</td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>'.$row["mobile_no"].'</td>
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
				<td>Trans Status</td>
				<td>'.$row["transstatus"].'</td>
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
		SELECT * FROM tradingbtc WHERE product_id = :product_id
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
			$output['crypto_name'] = $row['crypto_name'];
			$output['dollar_value'] = $row['dollar_value'];
			$output['frac_value'] = $row['frac_value'];
			$output['customer_rate'] = $row['customer_rate'];
			$output['selling_rate'] = $row['selling_rate'];

			$output['customer_name'] = $row['customer_name'];
			$output['mobile_no'] = $row['mobile_no'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	$dollar_value= $_POST["dollar_value"];
		$customer_rate= $_POST["customer_rate"];
	$selling_rate= $_POST["selling_rate"];
	
	$totalamount_cus= ($dollar_value * $customer_rate);
	$totalamount_cl = ($dollar_value * $selling_rate) ;
	$profit = ($totalamount_cl - $totalamount_cus);
		$query = "
		UPDATE tradingbtc
		set crypto_name = :crypto_name,
		dollar_value = :dollar_value,
		frac_value = :frac_value, 
		customer_rate = :customer_rate, 
		selling_rate = :selling_rate, 
		customer_name = :customer_name, 
		mobile_no = :mobile_no, 
		totalamount_cus = :totalamount_cus,
		totalamount_cl = :totalamount_cl,
		profit = :profit
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':crypto_name'			=>	$_POST['crypto_name'],
				':dollar_value'			=>	$_POST['dollar_value'],
				':frac_value'	=>	$_POST['frac_value'],
				':customer_rate'		=>	$_POST['customer_rate'],
				':selling_rate'			=>	$_POST['selling_rate'],
				':customer_name'	=>	$_POST['customer_name'],
				':mobile_no'	=>	$_POST['mobile_no'],
				':totalamount_cus'			=>	$totalamount_cus,
				':totalamount_cl'			=>	$totalamount_cl,
				':profit'			=>	$profit,
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Trading Details Updated';
		}
	}
if($_POST['btn_action'] == 'delete')
	{
		
		$query = "
		UPDATE tradingbtc
		SET transstatus = :transstatus,
		approved_by = :approved_by,
		confirm_date = :confirm_date 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':transstatus'	=>	'Confirmed',
				':approved_by'	=>	$user_name,
				':confirm_date'	=>	$date1,
				':product_id'		=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Transaction has been confirmed.';
		}
	}
}

?>