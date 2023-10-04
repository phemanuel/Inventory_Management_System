<?php

//user_action.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO expensesetup (expensename, clientid,expensestatus) 
		VALUES (:expensename, :clientid,:expensestatus)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':expensename'		=>	$_POST["expensename"],
				':clientid'		=>	$clientid,
				':expensestatus'		=>	'Active'
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Expense Name Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM expensesetup 
	    WHERE pid = '".$_POST["deptid"]."' AND
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
			if($row['expensestatus'] == 'Active')
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
				<td>'.$row["expensename"].'</td>
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
		SELECT * FROM expensesetup WHERE pid = :deptid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':deptid'	=>	$_POST["deptid"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
		
			$output['expensename'] = $row['expensename'];
			
			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['expensename'] != '')
		{
			$query = "
			UPDATE expensesetup SET 
				expensename = '".$_POST["expensename"]."'
				WHERE pid = '".$_POST["deptid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE expensesetup SET 
				expensename = '".$_POST["expensename"]."'
				WHERE pid = '".$_POST["deptid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Expense Name has been Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		else if($_POST['status'] == 'Inactive')
		{
			$status = 'Active';
		}
		$query = "
		UPDATE expensesetup
		SET expensestatus = :expensestatus 
		WHERE pid = :deptid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':expensestatus'	=>	$status,
				':deptid'		=>	$_POST["deptid"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Expense Name Status change to ' . $status;
		}
	}
}

?>