<?php

//user_action.php

include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];


$date1 = date('d-m-Y');
if(isset($_POST['btn_action']))
{

	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO customer (customername, emailaddy, mobileno,gender,birthday,birthmonth,status,confirmby,clientid) 
		VALUES (:customername, :emailaddy, :mobileno,:gender,:birthday,:birthmonth,:status,:confirmby,:clientid)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customername'		=>	$_POST["customername"],
				':emailaddy'		=>	$_POST["emailaddy"],
				':mobileno'		=>	$_POST["mobileno"],
				':gender'		=>	$_POST["gender"],
				':birthday'		=>	$_POST["birthday"],
				':birthmonth'		=>	$_POST["birthmonth"],
				':status'		=>	'Active',
				':confirmby'		=>	$_SESSION['user_email'],
				':clientid'		=>	$clientid
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Customer Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM customer WHERE rid = :rid 
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
			$output['customername'] = $row['customername'];
			$output['emailaddy'] = $row['emailaddy'];
			$output['mobileno'] = $row['mobileno'];
			$output['birthmonth'] = $row['birthmonth'];
			$output['birthday'] = $row['birthday'];
			$output['gender'] = $row['gender'];
			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['customername'] != '')
		{
			$query = "
			UPDATE customer SET 
				customername = '".$_POST["customername"]."', 
				emailaddy = '".$_POST["emailaddy"]."',
				mobileno = '".$_POST["mobileno"]."',
				birthmonth = '".$_POST["birthmonth"]."',
				birthday = '".$_POST["birthday"]."',
				gender = '".$_POST["gender"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE customer SET 
				customername = '".$_POST["customername"]."', 
				emailaddy = '".$_POST["emailaddy"]."',
				mobileno = '".$_POST["mobileno"]."',
				birthmonth = '".$_POST["birthmonth"]."',
				birthday = '".$_POST["birthday"]."',
				gender = '".$_POST["gender"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Customer Details has been Edited';
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
		UPDATE customer 
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
			echo 'Customer Status change to ' . $status;
		}
	}
}

?>