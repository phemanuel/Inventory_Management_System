<?php

//user_action.php

include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];

// If result matched $myusername and $mypassword, table row must be 1 row

$date1 = date('Y-m-d');
if(isset($_POST['btn_action']))
{
if($_POST['btn_action'] == 'load_applicantno')
	{
		echo fill_appno_list($connect, $_POST['applicantname']);
	}
	if($_POST['btn_action'] == 'load_dept1')
	{
		echo fill_dept1_list($connect, $_POST['applicantname']);
	}
	if($_POST['btn_action'] == 'load_post1')
	{
		echo fill_post1_list($connect, $_POST['applicantname']);
	}
	if($_POST['btn_action'] == 'load_salary')
	{
		echo fill_salary_list($connect, $_POST['applicantname']);
	}
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO movement (applicantno, applicantname,dept,dept1,approvedby,clientid,approveddate,postapplied) 
		VALUES (:applicantno, :applicantname, :dept,:dept1,:approvedby,:clientid,:approveddate,:postapplied)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':applicantno'		=>	$_POST["applicantno"],
				':applicantname'		=>	$_POST["applicantname"],
				':dept'		=>	$_POST["dept"],
				':dept1'		=>	$_POST["dept1"],
				':approvedby'		=>	$_POST["approvedby"],
				':clientid'		=>	$clientid,
				':approveddate'		=>	$date1,
				':postapplied'		=>	$_POST["postapplied"]
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
		
		$query1 = "
			UPDATE recruitment SET 
				dept = '".$_POST["dept1"]."'
				WHERE applicantno = '".$_POST["applicantno"]."' 
			";
			$statement1 = $connect->prepare($query1);
		$statement1->execute();
		$result1 = $statement1->fetchAll();
		if(isset($result1))
		{
			echo 'New Movement is added.';
		}
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM movement WHERE rid = :rid 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':rid'	=>	$_POST["rid"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			
			$output['dept1'] = $row['dept1'];
			$output['approvedby'] = $row['approvedby'];
			
			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['applicantname'] != '')
		{
			$query = "
			UPDATE movement SET 
				dept = '".$_POST["dept"]."',
				dept1 = '".$_POST["dept1"]."',
				approvedby = '".$_POST["approvedby"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE movement SET 
				dept = '".$_POST["dept"]."',
				dept1 = '".$_POST["dept1"]."',
				approvedby = '".$_POST["approvedby"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			$query1 = "
			UPDATE recruitment SET 
				dept = '".$_POST["dept1"]."'
				WHERE applicantno = '".$_POST["applicantno"]."' 
			";
			$statement1 = $connect->prepare($query1);
		$statement1->execute();
		$result1 = $statement1->fetchAll();
		if(isset($result1))
		{
			echo 'Movement Details has been Edited';
		}
			
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
		UPDATE promotion
		SET status = :status 
		WHERE rid = :rid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	=>	$status,
				':rid'		=>	$_POST["rid"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Promotion Status change to ' . $status;
		}
	}
}

?>