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
	
	//====calculate profit-----------
	
	
				$query = "
		INSERT INTO safe_lock (safename,safeusername,safeuserpass,date1,status,confirm_by,clientid) 
		VALUES (:safename,:safeusername,:safeuserpass,:date1,:status,:confirm_by,:clientid)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':safename'		=>	$_POST["safename"],
				':safeusername'		=>	$_POST["safeusername"],
				':safeuserpass'		=>	$_POST["safeuserpass"],				
				':date1'		=>	$date1,
				':status'		=>	"Active",
				':confirm_by'		=>	$user_name,
				':clientid'		=>	$clientid
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New safe lock Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM safe_lock
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
				<td>Safe Lock Name</td>
				<td>'.$row["safename"].'</td>
			</tr>
			<tr>
				<td>Safe Lock Username</td>
				<td>'.$row["safeusername"].'</td>
			</tr>
			<tr>
				<td>Safe Lock Password</td>
				<td>'.$row["safeuserpass"].'</td>
			</tr>
			
			<tr>
				<td>Date</td>
				<td>'.$row["date1"].'</td>
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
		SELECT * FROM safe_lock WHERE product_id = :product_id
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
			$output['safename'] = $row['safename'];
			$output['safeusername'] = $row['safeusername'];
			$output['safeuserpass'] = $row['safeuserpass'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	//====calculate profit-----------
	
		$query = "
		UPDATE safe_lock
		set safename = :safename,
		safeusername = :safeusername,	
		safeuserpass = :safeuserpass		
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':safename'			=>	$_POST['safename'],
				':safeusername'			=>	$_POST['safeusername'],
				':safeuserpass'			=>	$_POST['safeuserpass'],
				':product_id'			=>	$_POST['product_id']
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Safe Lock info updated';
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
		UPDATE safe_lock 
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
			echo 'Safe Lock Info status change to ' . $status;
		}
	}
}


?>