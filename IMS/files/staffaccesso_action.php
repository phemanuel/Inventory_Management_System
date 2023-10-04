<?php

//user_action.php

include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];

if(isset($_POST['btn_action']))
{
if($_POST['btn_action'] == 'load_dept1')
	{
		echo fill_dept1_list($connect, $_POST['applicantname']);
	}
	if($_POST['btn_action'] == 'Add')
	{

		$query = "
		INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,AMG,PMG,WMG,CMG,HRG,RPT,SMG,TRD,DEL,TRDREP,DIS,REB,department,apptype,appabbrv) 
		VALUES (:user_email, :user_password, :user_name, :user_type, :clientid, :user_status,:checkbox1,:checkbox2,:checkbox3,:checkbox4,:checkbox5,:checkbox6,:checkbox7,:checkbox8,:checkbox9,:checkbox10,:checkbox11,:checkbox12,:checkbox13:dept,:apptype,:appabbrv)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_email'		=>	$_POST["user_email"],
				':user_password'	=>	$_POST["user_password"],
				':user_name'		=>	$_POST["applicantname"],
				':user_type'		=>	$_POST["user_type"],
				':clientid'		=>	$clientid,
				':user_status'		=>	'Active',
				':checkbox1'		=>	$_POST["checkbox1"],
				':checkbox2'		=>	$_POST["checkbox2"],
				':checkbox3'		=>	$_POST["checkbox3"],
				':checkbox4'		=>	$_POST["checkbox4"],
				':checkbox5'		=>	$_POST["checkbox5"],
				':checkbox6'		=>	$_POST["checkbox6"],
				':checkbox7'		=>	$_POST["checkbox7"],
				':checkbox8'		=>	$_POST["checkbox8"],
				':checkbox9'		=>	"Disabled",
				':checkbox10'		=>	"Disabled",
				':checkbox11'		=>	"Disabled",
				':checkbox12'		=>	$_POST["checkbox12"],
				':checkbox13'		=>	$_POST["checkbox13"],
				':dept'		=>	$_POST["dept"],
				':apptype'		=>	$_SESSION["apptype"],
				':appabbrv'		=>	$_SESSION["appabbrv"]
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New User Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM user_details WHERE user_id = :user_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'	=>	$_POST["user_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			
			$output['user_type'] = $row['user_type'];
			$output['user_email'] = $row['user_email'];
			$output['user_password'] = $row['user_password'];
			$output['checkbox1'] = $row['ADM'];
			$output['checkbox2'] = $row['AMG'];
			$output['checkbox3'] = $row['PMG'];
			$output['checkbox4'] = $row['WMG'];
			$output['checkbox5'] = $row['CMG'];
			$output['checkbox6'] = $row['HRG'];
			$output['checkbox7'] = $row['RPT'];
			$output['checkbox8'] = $row['SMG'];
			$output['checkbox12'] = $row['DIS'];
			$output['checkbox13'] = $row['REB'];
			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['user_password'] != '')
		{
			$query = "
			UPDATE user_details SET 
				user_type = '".$_POST["user_type"]."',
				user_email = '".$_POST["user_email"]."',
				user_password = '".$_POST["user_password"]."',
				ADM = '".$_POST["checkbox1"]."',
				AMG = '".$_POST["checkbox2"]."',
				PMG = '".$_POST["checkbox3"]."',
				WMG = '".$_POST["checkbox4"]."',
				CMG = '".$_POST["checkbox5"]."',
				HRG = '".$_POST["checkbox6"]."',
				RPT = '".$_POST["checkbox7"]."',
				SMG = '".$_POST["checkbox8"]."'	,
				DIS = '".$_POST["checkbox12"]."',
				REB = '".$_POST["checkbox13"]."'
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		else
		{
			$query = "
			UPDATE user_details SET 
				user_type = '".$_POST["user_type"]."',
				user_email = '".$_POST["user_email"]."',
				user_password = '".$_POST["user_password"]."',
				ADM = '".$_POST["checkbox1"]."',
				AMG = '".$_POST["checkbox2"]."',
				PMG = '".$_POST["checkbox3"]."',
				WMG = '".$_POST["checkbox4"]."',
				CMG = '".$_POST["checkbox5"]."',
				HRG = '".$_POST["checkbox6"]."',
				RPT = '".$_POST["checkbox7"]."',
				SMG = '".$_POST["checkbox8"]."'	,
				DIS = '".$_POST["checkbox12"]."',
				REB = '".$_POST["checkbox13"]."'
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Staff Access Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		$query = "
		UPDATE user_details 
		SET user_status = :user_status 
		WHERE user_id = :user_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_status'	=>	$status,
				':user_id'		=>	$_POST["user_id"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'User Status change to ' . $status;
		}
	}
}

?>