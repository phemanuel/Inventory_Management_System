<?php

//user_action.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO deptsetup (deptname, depthod, clientid,deptstatus) 
		VALUES (:deptname, :depthod, :clientid,:deptstatus)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':deptname'		=>	$_POST["deptname"],
				':depthod'		=>	$_POST["depthod"],
				':clientid'		=>	$clientid,
				':deptstatus'		=>	'Active'
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Department Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM deptsetup WHERE deptid = :deptid 
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
			$output['deptname'] = $row['deptname'];
			$output['depthod'] = $row['depthod'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['deptname'] != '')
		{
			$query = "
			UPDATE deptsetup SET 
				deptname = '".$_POST["deptname"]."', 
				depthod = '".$_POST["depthod"]."'
				WHERE deptid = '".$_POST["deptid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE deptsetup SET 
				deptname = '".$_POST["deptname"]."', 
				depthod = '".$_POST["depthod"]."'
				WHERE deptid = '".$_POST["deptid"]."'
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Department has been Edited';
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
		UPDATE deptsetup 
		SET deptstatus = :deptstatus 
		WHERE deptid = :deptid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':deptstatus'	=>	$status,
				':deptid'		=>	$_POST["deptid"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Department Status change to ' . $status;
		}
	}
}

?>