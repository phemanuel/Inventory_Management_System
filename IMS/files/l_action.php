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
	if($_POST['btn_action'] == 'Add')
	{
	$startdate1 = $_POST["startdate"];
	$startdate = date("Y-m-d", strtotime($startdate1)); 
	$enddate1 = $_POST["enddate"];
	$enddate = date("Y-m-d", strtotime($enddate1)); 
		$query = "
		INSERT INTO leave1 (applicantno, applicantname, dept,postapplied,leavetype,duration,startdate,enddate,approvedby,status,clientid,approveddate) 
		VALUES (:applicantno, :applicantname, :dept,:postapplied,:leavetype,:duration,:startdate,:enddate,:approvedby,:status,:clientid,:approveddate)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':applicantno'		=>	$_POST["applicantno"],
				':applicantname'		=>	$_POST["applicantname"],
				':dept'		=>	$_POST["dept"],
				':postapplied'		=>	$_POST["postapplied"],
				':leavetype'		=>	$_POST["leavetype"],
				':duration'		=>	$_POST["duration"],
				':startdate'		=>	$startdate,
				':enddate'		=>	$enddate,
				':approvedby'		=>	$_POST["approvedby"],
				':status'		=>	'Active',
				':clientid'		=>	$clientid,
				':approveddate'		=>	$date1
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New leave Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM leave1 WHERE rid = :rid 
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
			
			$output['leavetype'] = $row['leavetype'];
			$output['duration'] = $row['duration'];
			$output['startdate'] = $row['startdate'];
			$output['enddate'] = $row['enddate'];
			$output['approvedby'] = $row['approvedby'];
			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['applicantname'] != '')
		{
		$startdate1 = $_POST["startdate"];
	$startdate = date("Y-m-d", strtotime($startdate1)); 
	$enddate1 = $_POST["enddate"];
	$enddate = date("Y-m-d", strtotime($enddate1)); 
			$query = "
			UPDATE leave1 SET 
				leavetype = '".$_POST["leavetype"]."',
				duration = '".$_POST["duration"]."',
				startdate = '$startdate',
				enddate = '$enddate',
				approvedby = '".$_POST["approvedby"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE leave1 SET 
				leavetype = '".$_POST["leavetype"]."',
				duration = '".$_POST["duration"]."',
				startdate = '$startdate',
				enddate = '$enddate',
				approvedby = '".$_POST["approvedby"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Leave Details has been Edited';
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
		UPDATE leave1 
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
			echo 'Leave Status change to ' . $status;
		}
	}
}

?>