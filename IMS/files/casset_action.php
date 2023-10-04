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
	
	
				$query = "
		INSERT INTO casset (itemname,itemqty,possession,date1,status,remark,confirm_by,clientid,dataid) 
		VALUES (:itemname,:itemqty,:possession,:date1,:status,:remark,:confirm_by,:clientid,:dataid)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':itemname'		=>	$_POST["itemname"],
				':itemqty'		=>	$_POST["itemqty"],
				':possession'		=>	$_POST["possession"],				
				':date1'		=>	$date1,
				':status'		=>	"Active",
				':remark'		=>	$_POST["remark"],
				':confirm_by'		=>	$user_name,
				':clientid'		=>	$clientid,
				':dataid'		=>	$dataid
				
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Asset Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM casset
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
				<td>Item Name</td>
				<td>'.$row["itemname"].'</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td>'.$row["itemqty"].'</td>
			</tr>
			<tr>
				<td>Whose Possession</td>
				<td>'.$row["possession"].'</td>
			</tr>
			
			<tr>
				<td>Date</td>
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
		SELECT * FROM casset WHERE product_id = :product_id
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
			$output['itemname'] = $row['itemname'];
			$output['itemqty'] = $row['itemqty'];
			$output['possession'] = $row['possession'];
			$output['remark'] = $row['remark'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
	
	//====calculate profit-----------
	
		$query = "
		UPDATE casset
		set itemname = :itemname,
		itemqty = :itemqty,
		possession = :possession,		
		remark = :remark		
		 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':itemname'			=>	$_POST['itemname'],
				':itemqty'			=>	$_POST['itemqty'],
				':possession'	=>	$_POST['possession'],
				':remark'			=>	$_POST['remark'],

				':product_id'			=>	$_POST['product_id']
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Asset info Edited';
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
		UPDATE casset 
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
			echo 'Asset Info status change to ' . $status;
		}
	}
}


?>