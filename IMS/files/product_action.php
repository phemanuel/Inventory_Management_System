<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$date1 = date('Y-m-d');
if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO product (category_name, product_name, product_description,product_quantity,product_unit,shelf,product_base_price,product_sell_price,product_barcode,product_type,product_enter_by,product_status,product_date,clientid,user_id) 
		VALUES (:category_name, :product_name, :product_description,:product_quantity,:product_unit,:shelf,:product_base_price,:product_sell_price,:product_barcode,:product_type,:product_enter_by,:product_status,:product_date,:clientid,:user_id)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'		=>	$_POST["category_name"],
				':product_name'		=>	$_POST["product_name"],
				':product_description'		=>	$_POST["product_description"],
				':product_quantity'		=>	$_POST["product_quantity"],
				':product_unit'		=>	$_POST["product_unit"],
				':shelf'		=>	$_POST["shelf"],
				':product_base_price'		=>	$_POST["product_base_price"],
				':product_sell_price'		=>	$_POST["product_sell_price"],
				':product_barcode'		=>	$_POST["product_barcode"],
				':product_type'		=>	$_POST["product_type"],
				':product_enter_by'		=>	$user_name,
				':product_status'		=>	'Active',
				':product_date'		=>	$date1,
				':clientid'		=>	$clientid,
				':user_id'		=>	$user_id
				
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Product Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM product 
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
			if($row['product_status'] == 'Active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$output .= '
			<tr>
				<td>Product Name</td>
				<td>'.$row["product_name"].'</td>
			</tr>
			<tr>
				<td>Product Description</td>
				<td>'.$row["product_description"].'</td>
			</tr>
			<tr>
				<td>Category</td>
				<td>'.$row["category_name"].'</td>
			</tr>
			<tr>
				<td>Product Bar Code</td>
				<td>'.$row["product_barcode"].'</td>
			</tr>
			<tr>
				<td>Available Quantity</td>
				<td>'.$row["product_quantity"].' '.$row["product_unit"].'</td>
			</tr>
			<tr>
				<td>Base Price</td>
				<td>'.$row["product_base_price"].'</td>
			</tr>
			<tr>
				<td>Selling Price</td>
				<td>'.$row["product_sell_price"].'</td>
			</tr>
			
			<tr>
				<td>Enter By</td>
				<td>'.$row["product_enter_by"].'</td>
			</tr>
			<tr>
				<td>Shelf</td>
				<td>'.$row["shelf"].'</td>
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
		SELECT * FROM product WHERE product_id = :product_id
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
			$output['category_name'] = $row['category_name'];
			$output['product_name'] = $row['product_name'];
			$output['product_description'] = $row['product_description'];
			$output['product_quantity'] = $row['product_quantity'];
			$output['product_unit'] = $row['product_unit'];
			$output['shelf'] = $row['shelf'];

			$output['product_base_price'] = $row['product_base_price'];
			$output['product_sell_price'] = $row['product_sell_price'];
			$output['product_barcode'] = $row['product_barcode'];
			$output['product_type'] = $row['product_type'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE product 
		set category_name = :category_name,
		product_name = :product_name,
		product_description = :product_description, 
		product_quantity = :product_quantity, 
		product_unit = :product_unit, 
		shelf = :shelf,
		product_base_price = :product_base_price, 
		product_sell_price = :product_sell_price, 
		product_barcode = :product_barcode,
		product_type = :product_type 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'			=>	$_POST['category_name'],
				':product_name'			=>	$_POST['product_name'],
				':product_description'	=>	$_POST['product_description'],
				':product_quantity'		=>	$_POST['product_quantity'],
				':product_unit'			=>	$_POST['product_unit'],
				':shelf'			=>	$_POST['shelf'],
				':product_base_price'	=>	$_POST['product_base_price'],
				':product_sell_price'	=>	$_POST['product_sell_price'],
				':product_barcode'			=>	$_POST['product_barcode'],
				':product_type'			=>	$_POST['product_type'],
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Product Details Edited';
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
		UPDATE product 
		SET product_status = :product_status 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_status'	=>	$status,
				':product_id'		=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Product status change to ' . $status;
		}
	}
}


?>