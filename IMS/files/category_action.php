<?php

//user_action.php

include('database_connection.php');
$clientid = $_SESSION['clientid'];

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO clientcategory (category_name, clientid,status) 
		VALUES (:category_name, :clientid,:status)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'		=>	$_POST["category_name"],
				':clientid'		=>	$clientid,
				':status'		=>	'Active'
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Category Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM clientcategory WHERE category_id = :category_id 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_id'	=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['category_name'] = $row['category_name'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['category_name'] != '')
		{
			$query = "
			UPDATE clientcategory SET 
				category_name = '".$_POST["category_name"]."' 
				WHERE category_id = '".$_POST["category_id"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE clientcategory SET 
				category_name = '".$_POST["category_name"]."'
				WHERE category_id = '".$_POST["category_id"]."'
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Category has been Edited';
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
		UPDATE clientcategory 
		SET status = :status 
		WHERE category_id = :category_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	=>	$status,
				':category_id'		=>	$_POST["category_id"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Category Status change to ' . $status;
		}
	}
}

?>