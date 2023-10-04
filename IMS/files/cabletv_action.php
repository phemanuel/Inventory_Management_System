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
if($_POST['btn_action'] == 'load_cableplan')
	{
		echo fill_cableplan_list($connect, $_POST['cablename']);
	}	
if($_POST['btn_action'] == 'Add')
	{
	
	//====calculate profit-----------
	$price_bought = $_POST["costprice"];
	$price_sold = $_POST["sellprice"];
	$profit = ($price_sold - $price_bought) ;
	
				$query = "
		INSERT INTO cabletv (customername,mobileno,iucno, cablename,cableplan,costprice,sellprice,paymentmode,date1,status,remark,confirmby,clientid,refcode,profit) 
		VALUES (:customername,:mobileno,:iucno, :cablename,:cableplan,:costprice,:sellprice,:paymentmode,:date1,:status,:remark,:confirmby,:clientid,:refcode,:profit)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customername'		=>	$_POST["customername"],
				':mobileno'		=>	$_POST["mobileno"],
				':iucno'		=>	$_POST["iucno"],
				':cablename'		=>	$_POST["cablename"],
				':cableplan'		=>	$_POST["cableplan"],
				':costprice'		=>	$_POST["costprice"],
				':sellprice'		=>	$_POST["sellprice"],
				':paymentmode'		=>	$_POST["paymentmode"],
				':date1'		=>	$date1,
				':status'		=>	"Active",
				':remark'		=>	$_POST["remark"],
				':confirmby'		=>	$user_name,
				':clientid'		=>	$clientid,
				':refcode'		=>	$_POST["refcode"],
				':profit'		=>	$profit
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Cable subsctiption added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM cabletv
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
				<td>'.$row["customername"].'</td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>'.$row["mobileno"].'</td>
			</tr>
			<tr>
				<td>IUC No</td>
				<td>'.$row["iucno"].'</td>
			</tr>
			<tr>
				<td>Cable Name</td>
				<td>'.$row["cablename"].'</td>
			</tr>
			
			<tr>
				<td>Cable Plan</td>
				<td>'.$row["cableplan"].'</td>
			</tr>
			<tr>
				<td>Amount</td>
				<td>'.$row["sellprice"].'</td>
			</tr>
			<tr>
				<td>Payment Mode</td>
				<td>'.$row["paymentmode"].'</td>
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
		SELECT * FROM cabletv WHERE product_id = :product_id
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
			$output['customername'] = $row['customername'];
			$output['mobileno'] = $row['mobileno'];
			$output['iucno'] = $row['iucno'];
			$output['cablename'] = $row['cablename'];
			$output['cableplan'] = $row['cableplan'];
			$output['costprice'] = $row['costprice'];
			$output['sellprice'] = $row['sellprice'];
			$output['payment_mode'] = $row['paymentmode'];
			$output['remark'] = $row['remark'];
			$output['refcode'] = $row['refcode'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	//====calculate profit-----------
	$price_bought = $_POST["costprice"];
	$price_sold = $_POST["sellprice"];
	$profit = ($price_sold - $price_bought) ;
		$query = "
		UPDATE cabletv
		set customername = :customername,
		mobileno = :mobileno,
		iucno = :iucno,
		cablename = :cablename,
		cableplan = :cableplan, 
		costprice = :costprice,
		sellprice = :sellprice,
		paymentmode = :paymentmode, 
		remark = :remark,
		refcode = :refcode,
		profit = :profit
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customername'			=>	$_POST['customername'],
				':mobileno'			=>	$_POST['mobileno'],
				':iucno'	=>	$_POST['iucno'],
				':cablename'		=>	$_POST['cablename'],
				':cableplan'		=>	$_POST['cableplan'],
				':costprice'			=>	$_POST['costprice'],
				':sellprice'	=>	$_POST['sellprice'],
				':paymentmode'	=>	$_POST['paymentmode'],
				':remark'			=>	$_POST['remark'],
				':refcode'			=>	$_POST['refcode'],
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
		UPDATE cabletv 
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
			echo 'Cable subscription status change to ' . $status;
		}
	}
}


?>