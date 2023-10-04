<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$dataid = $_SESSION['dataid'];
$date1 = date('Y-m-d');
$time1 = date("h:i:sa");
if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
	
	//====calculate profit-----------
	$price_bought = $_POST["price_bought"];
	$price_sold = $_POST["price_sold"];
	$profit = ($price_sold - $price_bought) ;
	
				$query = "
		INSERT INTO datainfo1 (customer_name,mobile_no,network_type, network_value,price_bought,price_sold,payment_mode,date1,status,remark,confirm_by,clientid,dataid,refcode,profit) 
		VALUES (:customer_name,:mobile_no,:network_type, :network_value,:price_bought,:price_sold,:payment_mode,:date1,:status,:remark,:confirm_by,:clientid,:dataid,:refcode,:profit)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'		=>	$_POST["customer_name"],
				':mobile_no'		=>	$_POST["mobile_no"],
				':network_type'		=>	$_POST["network_type"],
				':network_value'		=>	$_POST["network_value"],
				':price_bought'		=>	$_POST["price_bought"],
				':price_sold'		=>	$_POST["price_sold"],
				':payment_mode'		=>	$_POST["payment_mode"],
				':date1'		=>	$date1,
				':status'		=>	"Active",
				':remark'		=>	$_POST["remark"],
				':confirm_by'		=>	$user_name,
				':clientid'		=>	$clientid,
				':dataid'		=>	$dataid,
				':refcode'		=>	$_POST["refcode"],
				':profit'		=>	$profit
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Data Info Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM datainfo1
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
				<td>Network Type</td>
				<td>'.$row["network_type"].'</td>
			</tr>
			<tr>
				<td>Network Value</td>
				<td>'.$row["network_value"].'</td>
			</tr>
			
			<tr>
				<td>Price Bought</td>
				<td>'.$row["price_bought"].'</td>
			</tr>
			<tr>
				<td>Price Sold</td>
				<td>'.$row["price_sold"].'</td>
			</tr>
			<tr>
				<td>Payment Mode</td>
				<td>'.$row["payment_mode"].'</td>
			</tr>
			<tr>
				<td>Trans Date</td>
				<td>'.$row["date1"].'</td>
			</tr>
			<tr>
				<td>Remark</td>
				<td>'.$row["remark"].'</td>
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
		SELECT * FROM datainfo1 WHERE product_id = :product_id
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
			$output['network_type'] = $row['network_type'];
			$output['network_value'] = $row['network_value'];
			$output['price_bought'] = $row['price_bought'];
			$output['price_sold'] = $row['price_sold'];
			$output['payment_mode'] = $row['payment_mode'];
			$output['remark'] = $row['remark'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	//====calculate profit-----------
	$price_bought = $_POST["price_bought"];
	$price_sold = $_POST["price_sold"];
	$profit = ($price_sold - $price_bought) ;
		$query = "
		UPDATE datainfo1
		set customer_name = :customer_name,
		mobile_no = :mobile_no,
		network_type = :network_type,
		network_value = :network_value, 
		price_bought = :price_bought,
		price_sold = :price_sold,
		payment_mode = :payment_mode, 
		remark = :remark,
		profit = :profit
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_name'			=>	$_POST['customer_name'],
				':mobile_no'			=>	$_POST['mobile_no'],
				':network_type'	=>	$_POST['network_type'],
				':network_value'		=>	$_POST['network_value'],
				':price_bought'			=>	$_POST['price_bought'],
				':price_sold'	=>	$_POST['price_sold'],
				':payment_mode'	=>	$_POST['payment_mode'],
				':remark'			=>	$_POST['remark'],
				':profit'			=>	$profit,
				':product_id'			=>	$_POST['product_id']
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Data info Edited';
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
		UPDATE datainfo1 
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
			echo 'Data Info status change to ' . $status;
		}
	}
}


?>